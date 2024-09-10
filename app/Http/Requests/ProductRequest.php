<?php

namespace App\Http\Requests;

use App\Http\Requests\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id'     => 'nullable|string|max:100',
            // 'review_id'       => 'nullable|string|max:100',
            // 'comment_id'      => 'nullable|string|max:100',
            // 'payment_id'      => 'nullable|string|max:100',
            // 'billing_id'      => 'nullable|string|max:100',
            'name'            => 'required|string|max:100',
            'description'     => 'required|min:4|max:3000',
            'pre_price'       => 'required|string|max:255',
            'price'           => 'required|string|max:255',
            'quantity'        => 'required|string|max:255',
            'weight'          => 'required|string|max:255',
            'available'       => 'required|in:1,2',
            'status'          => 'required|in:1,2',
            'image'           => 'nullable|image|mimes:jpg,png,jpeg',
        ];

        // if ($this->update_id) {
        //     $rules['email'] = 'nullable|string|email|unique:doctors,email,' . $this->update_id;
        //     $rules['phone'] = 'nullable|string|max:15|unique:doctors,phone,' . $this->update_id;
        // }
    }
}
