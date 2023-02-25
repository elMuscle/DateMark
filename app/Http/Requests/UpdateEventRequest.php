<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'datum' => 'date|required',
            'was' => 'string|required',
            'ort' => 'string|required',
            'beginn' => ['required', 'date_format:"H:i"'],
            'ende' => ['required', 'date_format:"H:i"'],
            'tpoll_id' => 'integer|numeric',
        ];
    }
}
