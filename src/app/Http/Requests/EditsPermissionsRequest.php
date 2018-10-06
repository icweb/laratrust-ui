<?php

namespace IcWeb\TrustUi\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EditsPermissionsRequest extends FormRequest
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
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'name'          => ['required', 'string', 'max:191', Rule::unique('permissions')->ignore($request->route('permission'))],
            'display_name'  => ['nullable', 'string', 'max:191'],
            'description'   => ['nullable', 'string', 'max:191'],
        ];
    }
}
