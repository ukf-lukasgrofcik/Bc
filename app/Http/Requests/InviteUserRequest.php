<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InviteUserRequest extends FormRequest
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
            'role' => 'required|string|max:255|in:workplace_leader,lecturer,student,owner,employee',
            'email' => 'required|string|max:255|email',
            'company_id' => 'required_if:role,employee|required_if:role,owner|nullable|exists:companies,id',
            'workplace_id' => 'required_if:role,lecturer|required_if:role,workplace_leader|nullable|exists:workplaces,id',
        ];
    }
}
