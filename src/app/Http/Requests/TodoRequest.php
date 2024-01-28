<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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

    //  バリデーション
    public function rules()
    {
        return [
            // 文字数の条件と文字の有無
        
            'content' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            // エラー文の内容

            'content.required' => 'ToDoが入力されていません。',
            'content.max' => 'ToDoは :max 文字以内で入力してください。',
        ];
    }
}
