<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{
  /**
   * Transform the resource collection into an array.
   *
   * @return array<int|string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'customers' => $this->collection,
      'meta' => [
        'current_page' => $this->currentPage(),
        'last_page' => $this->lastPage(),
        'per_page' => $this->perPage(),
        'total' => $this->total(),
      ],
      'links' => [
        'first' => $this->url(1),
        'last' => $this->url($this->lastPage()),
        'prev' => $this->previousPageUrl(),
        'next' => $this->nextPageUrl(),
      ],
    ];
  }
}
