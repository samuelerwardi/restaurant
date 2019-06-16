<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

class TransaksiPenjualanStoreRequest extends FormRequest
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
        $current_date = Carbon::now();
        $data = $this->validationData();
        $return["transaksi"] = [
            "total" => 0,
            "ppn" => $data["ppn"],
            "created_at" => $current_date
        ];
        $return["transaksi_details"] = [];
        foreach ($data["kodebarang"] as $key => $value){
            $return["transaksi_details"][$key] = [
                "master_produks_id" => $value,
                "qty" => $data["qty"][$key],
                "price" => $data["harga"][$key],
                "subtotal" => $data["harga"][$key] * $data["qty"][$key],
                "created_at" => $current_date
            ];
        }
        $total = array_sum(array_column($return["transaksi_details"],"subtotal"));
        $return["transaksi"]["total"] = $total;
        $return["transaksi"]["grand_total"] = $total + ($total * $data["ppn"] / 100);

        return $return;
    }
}
