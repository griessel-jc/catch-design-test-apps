<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'id' => $this->id,
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'email' => $this->email,
      'gender' => $this->gender,
      'ip_address' => $this->ip_address,
      'company' => $this->company,
      'city' => $this->city,
      'title' => $this->title,
      'website' => $this->website,
    ];
  }
}
