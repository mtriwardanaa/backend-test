<?php

namespace Modules\Candidate\Http\Requests;

use App\Helper\Wrapper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CandidateCreate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = 'required|string';

        return [
            'name'             => $rule,
            'email'            => 'required|email:rfc,dns|unique:candidates',
            'phone'            => 'required|numeric',
            'education'        => $rule,
            'birthday'         => 'required|date_format:Y-m-d',
            'experience'       => $rule,
            'last_position'    => $rule,
            'applied_position' => $rule,
            'top_5_skills'     => 'required|string',
            'resume'           => 'required|distinct|mimes:pdf|max:2048',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function validate()
    {
        return $this->all();
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(Wrapper::error($validator->errors()->all(), 400));
    }
}
