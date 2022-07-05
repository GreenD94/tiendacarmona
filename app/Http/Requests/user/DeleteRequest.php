<?php

namespace App\Http\Requests\user;

use App\Traits\Responser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class DeleteRequest extends FormRequest
{
    use Responser;
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
            'id' => ['required', 'exists:users,id', 'integer'],

        ];
    }

    protected  function failedValidation(Validator $validator)
    {
        $this->errorResponse($validator->errors(), "Validation Error", 422);
    }
}
