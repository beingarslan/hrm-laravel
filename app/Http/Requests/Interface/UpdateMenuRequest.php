<?php

namespace App\Http\Requests\Interface;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasPermissionTo('edit-master-menus');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'name' => 'required|string|max:255|unique:menus,name,'.$this->id,
            'slug' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'can' => 'required|string|max:255',
            'order' => 'required|integer|min:1',
            'parent_id' => 'nullable|integer',
            'status' => 'required',
            'url' => 'nullable|string|max:255',
        ];
    }
}
