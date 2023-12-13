<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGigRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array

    {

      /*DB::update('UPDATE gigs SET company=?, title=?, location=?, email=?, tags=?, description=? where id=?', [
            $data['company'],
            $data['title'],
            $data['location'],
            $data['email'],
            $data['tags'],
            $data['description'],
            $gig->id
        ]);*/
        return [
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required','email' ,
            'tags' => ['required', 'regex:/^\S*$/u'],
            'description' => 'required',
            'logo' => 'nullable'|'image'
        ];
    }
}
