<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\V1\Addresses\StoreAddressAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Addresses\StoreAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $addresses = Address::where('user_id', $user->id)->get();

        return response()->json([
            'addresses' => $addresses
        ]);
    }

    public function store(StoreAddressRequest $request, StoreAddressAction $action)
    {
        $data = $action->execute($request->user(), $request->validated());

        return response()->json([
            'message' => 'Address created successfully',
            'address' => $data
        ], 201);
    }
}
