<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGigRequest extends FormRequest
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

         /*DB::insert('Insert into gigs (company, title, user_id, location, email, tags, description) values(?, ?, ?, ?, ?, ?, ?)', [
            $data['company'],
            $data['title'],
            $data['user_id'],
            $data['location'],
            $data['email'],
            $data['tags'],
            $data['description']]);*/
        
        /*DB::table('gigs')->insert([
            'company' => $data['company'],
            'title' => $data['title'],
            'user_id' => $data['user_id'],
            'location' => $data['location'],
            'email' => $data['email'],
            'tags' => $data['tags'],
            'description' => $data['description']
        ]);*/
        return [
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required','email' ,
            'tags' => ['required', 'regex:/^\S*$/u'],
            'description' => 'required',
            'logo' => ['nullable', 'image']
        ];

        



    }

}
