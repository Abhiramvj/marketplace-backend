<?php

namespace App\Http\Requests\V1\Addresses;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'is_default' => 'boolean',
        ];
    }

        public function messages()
        {
            return [
                'full_name.required' => 'Full name is required',
                'phone.required' => 'Phone number is required',
                'address_line1.required' => 'Address line 1 is required',
                'city.required' => 'City is required',
                'state.required' => 'State is required',
                'postal_code.required' => 'Postal code is required',
                'country.required' => 'Country is required',
                'is_default.boolean' => 'Is default must be a boolean value',
            ];
        }
}
