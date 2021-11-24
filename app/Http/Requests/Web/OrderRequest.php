<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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

            'store_id'   => ['required', 'integer'],
            'title'      => ['nullable', 'string' , 'max:100'],
            'name'       => ['required', 'string' , 'max:100'],
            'phone'      => ['required', 'string' , 'max:20'],
            'phone2'     => ['nullable' , 'string' , 'max:20'],
            'email'      => ['required', 'string' , 'max:100'],
            'city'       => ['required', 'string' , 'max:100'],
            'zone'       => ['required', 'string' , 'max:100'],
            'street'     => ['required', 'string' , 'max:100'],
            'building'   => ['required', 'string' , 'max:100'],
            'note'       => ['required', 'string'],
        ];
    }
}
