<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name'=>['required' , 'max:255'] ,
            'last_name'=>[ 'required' ,'max:255'],
            'gender'=> ['required' , 'in:male,female,other'],
            'date_of_birth'=> [ 'required' , 'before: -13 years'] ,
            'email'=> ['required' , 'email:rfc,dns' , Rule::unique(User::class)->ignore($this->user()->id) ],
            'number'=> [ 'required' , 'regex:/^\\+?[1-9][0-9]{7,14}$/' ],
            'password'=> [ 'required' ]
        ];
    }
}
