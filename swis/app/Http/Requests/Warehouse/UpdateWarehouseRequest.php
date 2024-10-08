<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWarehouseRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name.en'      => 'string|min:4',
            'name.ar'      => 'string|min:4',
            'location.latitude' => 'numeric|between:-90,90',
            'location.longitude' => 'numeric|between:-180,180',
            'branch_id' => 'integer|exists:branches,id',
            'capacity'  => 'integer|min:0',
            'parent_id' => 'integer|exists:warehouses,id',
            'user_id'   => 'integer|exists:users,id',

            'is_Distribution_point' => 'boolean',
        ];
    }
}
