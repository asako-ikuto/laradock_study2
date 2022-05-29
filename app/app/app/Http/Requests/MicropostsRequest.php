<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MicropostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'microposts' || 'microposts/{micropost}') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:140',
            'content' => 'required|string|max:140',
        ];
    }
}
