<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->customerService->list());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:32',
            'lastname' => 'required|string|max:32',
            'email' => 'required|email',
            'telephone' => 'required|string|min:10|max:32',
            'password' => 'required|string|min:6|max:20',
            'confirm_password' => 'required|string|min:6|max:20',
            'newsletter' => 'integer',
            'status' => 'integer',
            'approved' => 'integer',
            'safe' => 'integer',
            'token' => 'string',
            'code' => 'string',
            'date_added' => 'date',
        ]);
        $customer = $this->customerService->save($validatedData);
        return response()->json($customer);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return response()->json($this->customerService->findByEmail($customer->email));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:32',
            'lastname' => 'required|string|max:32',
            'email' => 'required|email',
            'telephone' => 'required|string|min:10|max:32',
            'password' => 'required|confirmed|string|min:4|max:40',
            'newsletter' => 'integer',
            'status' => 'integer',
            'approved' => 'integer',
            'safe' => 'integer',
            'token' => 'string',
            'code' => 'string',
            'date_added' => 'date',
        ]);
        $customer = $this->customerService->update($validatedData);
        return response()->json($customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        return response()->json($this->customerService->delete($customer));
    }
}
