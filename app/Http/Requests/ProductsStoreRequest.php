<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class ProductsStoreRequest extends FormRequest
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
            'samuel' => 'required'
            //
        ];
    }

//    protected function failedValidation(Validator $validator) {

//        return redirect($this->getRedirectUrl().$this->getRequestUri())->with('errors', $validator->errors()->getMessages());
//         throw (new ValidationException($validator))
//             ->errorBag($this->errorBag)
//             ->redirectTo($this->getRedirectUrl().$this->getRequestUri());

//        throw new HttpResponseException(response()->json($validator->errors()->getMessages(), 422));
//    }
}
