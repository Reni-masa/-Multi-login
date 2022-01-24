<?php

namespace App\Http\Requests\owner;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Owner;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

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
            'password' => [Password::defaults()],
            'new_password' => [Password::defaults()],
            'new_password_confirmation' => [Password::defaults()],
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
            // 'title.required' => 'A title is required',
            // 'body.required' => 'A message is required',
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
        $validator->sometimes('new_password', 'confirmed', function ($request)
        {
            return !empty($request['new_password']);

        });

        $validator->after(function ($validator) {
            dd($this->request['parameters']);
            // if ($this->somethingElseIsInvalid()) {
            //     $validator->errors()->add('field', 'Something is wrong with this field!');
            // }

            // $validator->sometimes('new', 'required|confirmed', function ($request) {

            //     // return empty($request['new']);
            //     return false;
            // });
            $this->newPasswordValidator($validator);

            // $validator->errors()->add('name', 'Something is wrong with this field!');
        });
    }

    public function newPasswordValidator($validator)
    {
        dd($this->input);
        dd($validator->data['new_password']);

        if (empty($this->request->new_password)) {
            return;
        };

        $user = Auth::user();
        if (Hash::check($this->request['new_password'], $user['password'])) {
            dd("ok");
        }

    }
}
