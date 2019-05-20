<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Carbon;
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
//            'samuel' => 'required'
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
        $data = $this->validationData();
        $return["master_produks"] = [
            "produk_kode" => $data["produk_kode"],
            "produk_nama" => $data["produk_nama"],
            "keuntungan" => $data["keuntungan"],
            "deskripsi" => $data["deskripsi"],
            "harga_jual" => $data["harga_jual"],
            "created_at" => Carbon::now()
        ];
        $return["master_produk_reseps"] = [];
        foreach ($data["kode_bahan"] as $key => $value){
            $return["master_produk_reseps"][$key] = [
                "master_bahan_id" => $value,
                "qty" => $data["qty"][$key],
                "created_at" => Carbon::now()
            ];
        }
        return $return;
    }

    protected function failedValidation(Validator $validator)
    {
//        return redirect($this->getRedirectUrl() . $this->getRequestUri())->with('errors', $validator->errors()->getMessages());
//        throw (new ValidationException($validator))
//            ->errorBag($this->errorBag)
//            ->redirectTo($this->getRedirectUrl() . $this->getRequestUri());

        throw new HttpResponseException(response()->json($validator->errors()->getMessages(), 422));
    }
}
