<?php

namespace App\Http\Controllers;

use App\Repositories\Report\ReportRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;
use League\Fractal\Manager;

class ReportController extends Controller
{
    //
    public function __construct(ReportRepository $repo, Manager $fractal, Request $request)
    {
        parent::__construct($repo, $fractal, $request);
    }

    public function transaksi_pembelian(){
        return view("report.transaksi_pembelian");
    }
}
