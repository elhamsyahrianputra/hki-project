<?php

namespace App\Http\Requests\Admin\Announcement;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnnouncementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'exists:users,id',
            'title' => 'required',
            'body' => 'required',
            'cover_url' => '',
        ];
    }

    public function attributes()
    {
        return [
            'user_id' => 'ID User',
            'title' => 'Judul',
            'body' => 'Isi',
            'cover_url' => 'Cover',
        ];
    }
}
