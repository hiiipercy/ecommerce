<?php

namespace App\Http\Requests;

use App\Http\Requests\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'name'            => 'required|string|max:100',
            'email'           => 'required|string|email|unique:users,email,' . $this->update_id,
            'number'          => 'required|string|max:15|unique:users,number,' . $this->update_id,
            'usertype'        => 'required|in:0,1,2',
            'address'         => 'required|string|max:100',
            'password'        => 'required|password|max:255',
        ];

        if ($this->update_id) {
            $rules['email'] = 'nullable|string|email|unique:users,email,' . $this->update_id;
            $rules['number']= 'nullable|string|max:15|unique:users,number,' . $this->update_id;
        }
    
    }
}
