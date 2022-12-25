<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
            'image' => 'required',
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'country_id' => 'required',
            'gender' => 'required',
            'qualification' => [Rule::requiredIf($this->freelancer == 1)],
            'expertise' => [Rule::requiredIf($this->freelancer == 1)],
            'skills' => [Rule::requiredIf($this->freelancer == 1)],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'image.required' => 'Please upload your profile picture',
            'first_name.required' => 'Please enter your first name',
            'last_name.required' => 'Please enter your last name',
            'email.required' => 'Please enter your email',
            'email.unique' => 'This email is already registered',
            'password.required' => 'Please enter your password',
            'password.confirmed' => 'Password and Confirm Password do not match',
            'country_id.required' => 'Please select your country',

        ];
    }
}
