<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('customers', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string('first_name')->nullable();
      $table->string('last_name')->nullable();
      $table->string('email')->unique();
      $table->string('gender', 100);
      $table->string('ip_address', 45);
      $table->string('company')->nullable();
      $table->string('city')->nullable();
      $table->string('title')->nullable();
      $table->text('website')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('customers');
  }
};
