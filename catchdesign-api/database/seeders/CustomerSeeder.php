<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;
use Carbon\Carbon;

class CustomerSeeder extends Seeder
{
  protected $headers = [];
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::disableQueryLog();
    DB::table('customers')->truncate();

    LazyCollection::make(function () {
      $fileHandle = fopen(storage_path('data/customers.csv'), 'r');

      // Get and store headers from first row
      if (($headers = fgetcsv($fileHandle)) !== false) {
        $this->headers = array_map(function ($header) {
          return trim(strtolower($header));
        }, $headers);

        $this->headers[] = 'created_at';
        $this->headers[] = 'updated_at';
      }

      while (($row = fgetcsv($fileHandle, 4096)) !== false) {
        $cleanValues = array_map(function ($value) {
          return blank($value) ? null : trim($value);
        }, $row);

        // Add the timestamps manually
        $cleanValues['created_at'] = Carbon::now();
        $cleanValues['updated_at'] = Carbon::now();

        yield array_combine($this->headers, $cleanValues);
      }

      fclose($fileHandle);
    })->chunk(1000)->each(function (LazyCollection $chunk) {
      DB::table('customers')->insert($chunk->toArray());
    });
  }
}
