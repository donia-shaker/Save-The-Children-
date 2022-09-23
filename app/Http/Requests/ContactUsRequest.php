<?php

namespace App\Http\Requests;

use App\Http\Controllers\Enum\ErrorMessage;
use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'nameAr'=>['required','string', 'between: 3, 255'],
            'nameEn'=>['required','string', 'between: 3, 255'],
            'link'=>['required','string', 'min: 3'],
            'icon'=>['required','string', 'between: 3, 30'],
        ];
    }

    public function messages()
    {
        return [
            'nameAr.reuired' => ErrorMessage::VALIDATION_REQUIRED_MESSAGE,
            'nameEn.required' =>  ErrorMessage::VALIDATION_REQUIRED_MESSAGE,
            'link.required' =>  ErrorMessage::VALIDATION_REQUIRED_MESSAGE,
            'descriptionEn.required' =>  ErrorMessage::VALIDATION_REQUIRED_MESSAGE,
            'icon.required' =>  ErrorMessage::VALIDATION_REQUIRED_MESSAGE,
        ];
    }
}
