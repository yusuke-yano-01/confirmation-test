<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
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
            'category_id' => ['required', 'integer'],
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'integer', 'in:1,2,3'],
            'email' => ['required', 'email'],
            'tell' => ['required', 'numeric', 'digits_between:10,11'],
            'address' => ['required', 'string', 'max:255'],
            'building' => ['nullable', 'string', 'max:255'],
            'detail' => ['required', 'string', 'max:120'],
        ];
    }
        
    public function messages()
    {
        return [
            'category_id.required' => 'カテゴリを選択してください',
            'category_id.integer' => 'カテゴリを選択してください',
            'last_name.required' => '苗字を入力してください',
            'last_name.string' => '苗字を文字列で入力してください',
            'last_name.max' => '苗字を255文字以下で入力してください',
            'first_name.required' => '名前を入力してください',
            'first_name.string' => '名前を文字列で入力してください',
            'first_name.max' => '名前を255文字以下で入力してください',
            'gender.required' => '性別を選択してください',
            'gender.integer' => '性別を選択してください',
            'gender.in' => '性別を正しく選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスを正しい形式で入力してください',
            'email.unique' => 'メールアドレスが既に存在しています',
            'tell.required' => '電話番号を入力してください',
            'tell.numeric' => '電話番号を数字で入力してください',
            'tell.digits_between' => '電話番号は10桁または11桁の数字で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'address.max' => '住所を255文字以下で入力してください',
            'building.nullable' => '建物名を入力してください',
            'building.string' => '建物名を文字列で入力してください',
            'building.max' => '建物名を255文字以下で入力してください',
            'detail.required' => 'お問い合せ内容を入力してください',
            'detail.string' => 'お問い合せ内容を文字列で入力してください',
            'detail.max' => 'お問い合せ内容は120文字以下で入力してください',
        ];
    }
}
