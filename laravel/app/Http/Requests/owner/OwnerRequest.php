<?php

namespace App\Http\Requests\owner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class OwnerRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('owners')->ignore(Auth::id())],
        ];
    }

    /**
     * 定義済みバリデーションルールのエラーメッセージのカスタマイズ
     *
     * @return array
     */
    public function messages()
    {
        return [
            'new_password.confirmed' => '新しいパスワードと確認パスワードが一致しません',
        ];
    }

    /**
     * バリデータインスタンスの設定
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        // 新規passと確認passの一致確認
        $validator->sometimes('new_password', 'confirmed|min:8', function ($request)
        {
            return !empty($request['new_password']);
        });

        $validator->after(function ($validator) {

            if (!$this->newPasswordValidator()) {
                $validator->errors()->add('current_password', '登録されているパスワードと一致しません。');
            };
        });
    }

    public function newPasswordValidator()
    {
        $request = app(Request::class);

        if (empty($request['new_password'])) {
            return true;
        };

        $user = Auth::user();
        return (Hash::check($request['current_password'], $user['password'])) ? true : false;
    }
}
