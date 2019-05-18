<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterBahanStore extends FormRequest
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
            'kode_bahan' => 'required',
            'nama_bahan' => 'required',
            'satuan' => 'required',
        ];
    }
}
