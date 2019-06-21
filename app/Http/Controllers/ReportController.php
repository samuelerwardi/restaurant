<?php

namespace App\Http\Controllers;

use App\Repositories\MasterBahanStok\MasterBahanStokRepository;
use App\Repositories\TransaksiKeluar\TransaksiKeluarRepository;
use App\Repositories\TransaksiPembelian\TransaksiPembelianRepository;
use App\Repositories\TransaksiPenjualan\TransaksiPenjualanRepository;
use Illuminate\Http\Request;
use League\Fractal\Manager;

class ReportController extends Controller
{
    public $data;
    /** @var $transaksiPembelianRepository TransaksiPembelianRepository */
    public $transaksiPembelianRepository;
    /** @var $transaksiPenjualanRepository TransaksiPenjualanRepository */
    public $transaksiPenjualanRepository;
    /** @var $masterBahanStokRepository MasterBahanStokRepository */
    public $masterBahanStokRepository;
    /** @var $transaksiKeluarRepository TransaksiKeluarRepository */
    public $transaksiKeluarRepository;

    public function __construct(TransaksiPembelianRepository $transaksiPembelianRepository, TransaksiPenjualanRepository $transaksiPenjualanRepository, MasterBahanStokRepository $masterBahanStokRepository, TransaksiKeluarRepository $transaksiKeluarRepository ,Manager $fractal, Request $request)
    {
        $this->transaksiPembelianRepository = $transaksiPembelianRepository;
        $this->transaksiPenjualanRepository = $transaksiPenjualanRepository;
        $this->masterBahanStokRepository = $masterBahanStokRepository;
        $this->transaksiKeluarRepository = $transaksiKeluarRepository;
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
        $this->data = $this->transaksiPenjualanRepository->all();
        return view("report.transaksi_penjualan",["datas" => $this->data]);
    }
    public function transaksi_penjualan_view_detail($id){
        $this->data = $this->transaksiPenjualanRepository->find($id);
        return view("report.transaksi_penjualan-modal", ["datas" => $this->data]);
    }
    public function transaksi_keluar(){
        $this->data = $this->transaksiKeluarRepository->all();
        return view("report.transaksi_keluar",["datas" => $this->data]);
    }
    public function transaksi_keluar_view_detail($id){
        $this->data = $this->transaksiPembelianRepository->find($id);
        return view("report.transaksi-keluar-modal", ["datas" => $this->data]);
    }
    public function master_bahans_stok(Request $request){
        $this->data = $this->masterBahanStokRepository->sumQtyAll($request->all());
        return view("report.master-bahans-stok", ["datas" => $this->data]);   
    }

    public function master_bahans_stok_detail($id){
        $this->data = $this->masterBahanStokRepository->findBy("master_bahans_id", $id);
        return view("report.master-bahans-stok-detail", ["datas" => $this->data]);
    }
}
