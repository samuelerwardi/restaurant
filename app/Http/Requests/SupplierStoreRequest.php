<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class SupplierStoreRequest extends FormRequest
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
            //
        ];
    }

    protected function getValidatorInstance()
    {
        $this->getInputSource()->replace($this->modifyData());
        $validator = parent::getValidatorInstance();

        return $validator;
    }

    protected function modifyData()
    {
        $return = $this->validationData();
        $return["created_at"] = Carbon::now();
        return $return;
    }
}
