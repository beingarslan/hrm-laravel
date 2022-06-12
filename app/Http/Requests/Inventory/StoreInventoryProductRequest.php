<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreInventoryProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasPermissionTo('add-inventory-products');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'sku' => 'required|max:100',
            'cost_price' => 'required|integer',
            'sale_price' => 'required|integer',
            'discount_price' => 'required|integer',
            'discount_percentage' => 'required|integer',
            'product_type_id' => 'required',
            'product_category_id' => 'required',
            'product_status_id' => 'required'
        ];
    }
}
