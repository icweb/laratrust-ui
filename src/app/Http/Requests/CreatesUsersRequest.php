<?php

namespace ICWEB\Trusty\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatesUsersRequest extends FormRequest
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
            'name'              => ['required', 'string', 'max:191'],
            'email'             => ['required', 'email', 'unique:users'],
            'password'          => ['required', 'string', 'max:191', 'same:confirm_password'],
            'confirm_password'  => ['required', 'string', 'max:191'],
        ];
    }
}
