<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddVisitedInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request. バリデーション適用範囲
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request. バリデーションルール
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'aquarium_name' => 'required|string|max:255',
            'visited_date' => 'required|date',
            'tweet' => 'required|string|max:999',
            'aquarium_images' => 'required|array|max:5', // 最大5枚の画像を許可
            'aquarium_images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048', // 画像ファイルの種類とサイズ制限
        ];
    }

    /**
     * バリデーションエラーメッセージのカスタマイズ
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'aquarium_name.required' => '水族館名を入力してください。',
            'visited_date.required' => '訪問日を入力してください。',
            'tweet.required' => 'ひとことを入力してください。',
            'tweet.max' => 'ひとことは999文字以内で入力してください',
            'aquarium_images.required' => '写真を入力してください。',
            'aquarium_images.*.mimes' => '画像はJPEG、PNG、GIF、SVG形式である必要があります。',
            'aquarium_images.*.max' => '画像ファイルは最大2MBまでです。',
        ];
    }
}
