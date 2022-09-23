<?php

namespace App\Http\Requests;

use App\Http\Controllers\Enum\ErrorMessage;
use Illuminate\Foundation\Http\FormRequest;

class MainGoalsRequest extends FormRequest
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
            'nameAr' => ['required', 'string'],
            'nameEn' => ['required', 'string'],
            'descriptionAr' => ['required', 'string'],
            'descriptionEn' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'nameAr.reuired' => ErrorMessage::VALIDATION_REQUIRED_MESSAGE,
            'nameEn.required' =>  ErrorMessage::VALIDATION_REQUIRED_MESSAGE,
            'descriptionAr.required' =>  ErrorMessage::VALIDATION_REQUIRED_MESSAGE,
            'descriptionEn.required' =>  ErrorMessage::VALIDATION_REQUIRED_MESSAGE,
        ];
    }
}
