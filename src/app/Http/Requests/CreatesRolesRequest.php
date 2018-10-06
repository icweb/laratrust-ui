<?php

namespace Icweb\Trusty\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatesRolesRequest extends FormRequest
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
            'name'          => ['required', 'string', 'max:191', 'unique:roles'],
            'display_name'  => ['nullable', 'string', 'max:191'],
            'description'   => ['nullable', 'string', 'max:191'],
        ];
    }
}
