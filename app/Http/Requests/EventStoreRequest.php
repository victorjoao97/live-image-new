<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
        return array(
            'name' => 'required|min:5',
            'privacy_event_id' => 'required:numeric',
            'location' => 'required|min:5',
            'presentation' => 'required|min:5'
        );
    }
}
