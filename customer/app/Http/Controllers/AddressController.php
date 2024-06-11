<?php

namespace App\Http\Controllers;

use App\Services\AddressService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    protected $addressService;
    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }
    public function list($id) {
        $data = $this->addressService->list($id);
        return response()->json($data);
    }
    public function save(Request $request) {
        $validatedData = $request->validate([
            'address_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'firstname' => 'required|string|max:32',
            'lastname' => 'required|string|max:32',
            'address_1' => 'required|string|min:3|max:128',
            'address_2' => 'nullable|string',
            'city' => 'required|string|min:2|max:128',
            'postcode' => 'nullable|string|min:2|max:10',
            'country_id' => 'required|integer',
            'zone_id' => 'required|integer',
            'custom_field' => 'nullable|array',
        ]);
        $address = $this->addressService->save($validatedData);
        return response()->json($address);
    }
    public function delete($id){
        $result = $this->addressService->delete($id);
        return response()->json($result);
    }
    public function update(Request $request) {
        $validatedData = $request->validate([
            'address_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'firstname' => 'required|string|max:32',
            'lastname' => 'required|string|max:32',
            'address_1' => 'required|string|min:3|max:128',
            'address_2' => 'nullable|string',
            'city' => 'required|string|min:2|max:128',
            'postcode' => 'nullable|string|min:2|max:10',
            'country_id' => 'required|integer',
            'zone_id' => 'required|integer',
            'custom_field' => 'nullable|array',
        ]);
        $result = $this->addressService->update($validatedData);
        return response()->json($result);
    }
}
