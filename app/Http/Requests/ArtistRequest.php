<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
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
        $rules = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'stage_name' => 'max:255',
            'phone_number' => 'required|min:10|max:10|unique:artists,phone_number',
            'email' => 'email|max:255|unique:artists,email',
            'image' => 'mimes:jpg,png',
            'address' => 'max:255',
            'facebook_link' => 'max:255',
            'instagram_link' => 'max:255',
        ];

        if ($this->method() == 'PATCH') {
            $rules['phone_number'] = 'required|min:10|max:10|unique:artists,phone_number,' . $this->route('artist');
            $rules['email'] = 'email|max:255|unique:artists,email,' . $this->route('artist');
        }
        
        return $rules;
    }
}
