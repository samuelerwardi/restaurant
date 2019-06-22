<?php

namespace App\Http\Controllers;

use App\Repositories\TransaksiKeluar\TransaksiKeluarRepository;
use App\Repositories\TransaksiPembelian\TransaksiPembelianRepository;
use App\Repositories\TransaksiPenjualan\TransaksiPenjualanRepository;
use App\TransaksiPenjualan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $transaksiPenjualanRepository;
    protected $transaksiPembelianRepository;
    protected $transaksiKeluarRepository;
    public function __construct(TransaksiPenjualanRepository $transaksiPenjualanRepository, TransaksiPembelianRepository $transaksiPembelianRepository, TransaksiKeluarRepository $transaksiKeluarRepository)
    {
        $this->middleware('auth');
        $this->transaksiPenjualanRepository = $transaksiPenjualanRepository;
        $this->transaksiPembelianRepository = $transaksiPembelianRepository;
        $this->transaksiKeluarRepository = $transaksiKeluarRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->data["transaksi_keluar"] = $this->transaksiKeluarRepository->all();
        $this->data["transaksi_pembelian"] = $this->transaksiPembelianRepository->all();
        $this->data["transaksi_penjualan"] = $this->transaksiPenjualanRepository->all();

        return view('home.index', ["datas" => $this->data]);
    }
}
