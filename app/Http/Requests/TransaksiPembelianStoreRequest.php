<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

class TransaksiPembelianStoreRequest extends FormRequest
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
        $data = $this->validationData();
        $return["transaksi_pembelian"] = [
            "supplier_id" => $data["supplier_id"],
            "total" => 0,
            "ppn" => $data["ppn"],
            "created_at" => Carbon::now()

        ];
        $return["transaksi_pembelian_details"] = [];
        foreach ($data["kodebarang"] as $key => $value){
            $return["transaksi_pembelian_details"][$key] = [
                "master_bahan_id" => $value,
                "qty" => $data["qty"][$key],
                "price" => $data["harga"][$key],
                "subtotal" => $data["harga"][$key] * $data["qty"][$key],
                "created_at" => Carbon::now()
            ];
            $return["master_bahans_stok"][$key] = [
                "master_bahans_id" => $value,
                "qty" => $data["qty"][$key],
                "class" => Route::currentRouteName(),
                "created_at" => Carbon::now()
            ];
        }
        $total = array_sum(array_column($return["transaksi_pembelian_details"],"subtotal"));
        $return["transaksi_pembelian"]["total"] = $total;
        $return["transaksi_pembelian"]["grand_total"] = $total + ($total * $data["ppn"] / 100);
        return $return;
    }
}
