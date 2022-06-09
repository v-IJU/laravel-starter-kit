<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailConfigRequest extends FormRequest
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
          
            'mail_transport'=>['required', 'string'],
            'mail_host'=>['required', 'string'],
            'mail_port'=>['required'],
            'mail_username'=>['required', 'string'],
            'mail_password'=>['required', 'string'],
            'mail_encryption'=>['required', 'string'],
            'mail_from'=>['required', 'string', 'email'],
        ];
    }
}
