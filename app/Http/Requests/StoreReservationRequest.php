<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
            'player_name' => 'required|max:255',
            'player_surname' => 'required|max:255',
            'email' => 'required',
            'court' => 'required',
            'date' => 'required|date|after:today',
            'start_time' => 'required|after:now',
            'end_time' => 'required|after:start_time',
        ];
    }
}
