<?php

namespace App\Actions\V1\Addresses;


class StoreAddressAction
{
    public function execute($user, array $data)
    {
        if(!empty($data['is_default']) && $data['is_default'] === true) {
            $user->addresses()->update(['is_default' => false]);
        }
        
        return $user->addresses()->create([
            'full_name' => $data['full_name'],
            'phone' => $data['phone'],
            'label' => $data['label'] ?? null,
            'address_line1' => $data['address_line1'],
            'address_line2' => $data['address_line2'] ?? null,
            'city' => $data['city'],
            'state' => $data['state'],
            'postal_code' => $data['postal_code'],
            'country' => $data['country'],
            'is_default' => $data['is_default'] ?? false,
        ]);

    }
}
