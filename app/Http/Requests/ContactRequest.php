<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //для отплавки без авторизации
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required|min:2|max:20',
          
          'message' => 'required|min:10|max:500'
        ];
    }

    public function messages() {
      return [
        'name.required' => 'Поле имя обязательно для заполнения',
        'name.min' => 'Поле имя должно быть больше двух символов',
        'name.max' => 'Поле имя должно быть меньше 20 символов',
        'message.required' => 'Поле сообщение обязательно для заполнения',
        'message.min' => 'Поле сообщение должно быть больше 10 символов',
        'message.max' => 'Поле сообщение должно быть меньше 500 символов'
      ];
    }
}
