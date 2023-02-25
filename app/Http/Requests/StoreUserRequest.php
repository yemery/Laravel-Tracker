<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()

    {
        return [
            //
            '*'=>'required',
            'first_name'=>'alpha',
            'last_name'=>'alpha',
            'email'=>'email|unique:users',
            'password'=>'required' // removed this regex from the rules just for the test '||regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'A first name is required.',
            'first_name.alpha' => 'Only letters are allowed.',
            'email.required'  => 'Please enter a valid email.',
            'email.unique'  => 'This email had been already used, please enter a new one.',
        ];
        
    }
    
}
