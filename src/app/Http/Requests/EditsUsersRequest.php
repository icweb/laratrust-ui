<?php

namespace Icweb\Trusty\App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EditsUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !config('trusty.demo');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'name'              => ['required', 'string', 'max:191'],
            'email'             => ['required', 'email', Rule::unique('users')->ignore($request->route('user'))],
            'password'          => ['required_with:confirm_password,', 'same:confirm_password'],
            'confirm_password'  => ['required_with:password,'],
        ];
    }
}
