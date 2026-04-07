<?php

namespace App\Actions\V1\Addresses;

use App\Models\Address;
use Exception;

class UpdateAddressAction
{
    public function execute($user, Address $address, array $data)
    {
        if ($address->user_id !== $user->id) {
            throw new Exception('Unauthorized', 403);
        }


        if (!empty($data['is_default']) && $data['is_default'] === true) {
            $user->addresses()
                ->where('id', '!=', $address->id)
                ->update(['is_default' => false]);
        }

        $address->update([
            'full_name' => $data['full_name'] ?? null,
            'phone' => $data['phone'] ?? null,
            'label' => $data['label'] ?? null,
            'address_line1' => $data['address_line1'] ?? null,
            'address_line2' => $data['address_line2'] ?? null,
            'city' => $data['city'] ?? null,
            'state' => $data['state'] ?? null,
            'postal_code' => $data['postal_code'] ?? null,
            'country' => $data['country'] ?? null,
            'is_default' => $data['is_default'] ?? false,
        ]);

        return $address;
    }
}
