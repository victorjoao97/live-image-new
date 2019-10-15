<?php

namespace App\Http\Requests;

use App\Event;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EventRequest extends FormRequest
{
    public function authorize()
    {
        if (!$this->request->all()['id'])
            return false;
        if ($this->route('id') != $this->request->all()['id']){
            return false;
        }else{
            if ($this->is('*/restore')){
                $event = Event::onlyTrashed()->where('user_id', Auth::id())->where('id', $this->route('id'))->first();
            }else{
                $event = Event::where('user_id', Auth::id())->where('id', $this->route('id'))->first();
            }
            return $event ? true : false;
        }
    }

    public function rules()
    {
        if (!$this->is('*/restore','*/destroy*','*/destroy')) {
            return array(
                'name' => 'required|min:5',
                'privacy_event_id' => 'required:numeric'
            );
        }
        return [];
    }
}
