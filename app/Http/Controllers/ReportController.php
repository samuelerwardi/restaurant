<?php

namespace App\Http\Controllers;

use App\Repositories\TransaksiPembelian\TransaksiPembelianRepository;
use App\Repositories\TransaksiPenjualan\TransaksiPenjualanRepository;
use Illuminate\Http\Request;
use League\Fractal\Manager;

class ReportController extends Controller
{
    //
    public $data;
    /** @var $transaksiPembelianRepository TransaksiPembelianRepository */
    public $transaksiPembelianRepository;
    /** @var $transaksiPenjualanRepository TransaksiPenjualanRepository */
    public $transaksiPenjualanRepository;

    public function __construct(TransaksiPembelianRepository $transaksiPembelianRepository, Manager $fractal, Request $request)
    {
        $this->transaksiPembelianRepository = $transaksiPembelianRepository;
        $this->transaksiPenjualanRepository = new TransaksiPenjualanRepository();
    }

    public function transaksi_pembelian(){
        $this->data = $this->transaksiPembelianRepository->all();
        return view("report.transaksi_pembelian",["datas" => $this->data]);
    }

    public function transaksi_pembelian_view_detail($id){
        $this->data = $this->transaksiPembelianRepository->find($id);
        return view("report.transaksi-pembelian-modal", ["datas" => $this->data]);
    }
    public function transaksi_penjualan(){
        $this->data = $this->transaksiPembelianRepository->all();
        return view("report.transaksi_penjualan",["datas" => $this->data]);
    }

    public function transkasi_penjualan_view_detail($id){
        $this->data = $this->transaksiPembelianRepository->find($id);
        return view("report.transaksi-pembelian-modal", ["datas" => $this->data]);
    }
}
