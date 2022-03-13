<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInternshipRequest extends FormRequest
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
            'academic_year' => 'required|string|max:255',
            'type_id' => 'required|integer|exists:types,id',
            'tutor_id' => 'required|integer|exists:users,id',
            'subject_id' => 'required|integer|exists:subjects,id',

            'company_id' => 'required_without:company.name,company.address,company.email|nullable|integer|exists:companies,id',
            'company.name' => 'required_without:company_id|nullable|string|max:255',
            'company.address' => 'required_without:company_id|nullable|string|max:255',
            'company.email' => 'required_without:company_id|nullable|string|max:255|email',
        ];
    }
}
