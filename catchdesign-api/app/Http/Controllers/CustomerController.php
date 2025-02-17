<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use App\Http\Responses\ApiResponse;
use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(int $perPage = 15)
  {
    try {
      $customers = Customer::paginate($perPage);
      if ($customers->currentPage() > $customers->lastPage()) {
        return ApiResponse::sendError('Failed to fetch customers', 500, ['error' => 'Out of bounds']);
      }
      return ApiResponse::sendResponse(new CustomerCollection($customers), '');
    } catch (\Exception $e) {
      return ApiResponse::sendResponse(['error' => 'Customers not found'], $e->getMessage(), 404);
    }
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Customer $customer)
  {
    try {
      return ApiResponse::sendResponse(new CustomerResource(Customer::findOrFail($customer->id)));
    } catch (\Exception $e) {
      return ApiResponse::sendError('Failed to fetch customer', 500, ['error' => 'Customer not found']);
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Customer $customer)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Customer $customer)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Customer $customer)
  {
    //
  }
}
