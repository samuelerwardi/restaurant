<?php

namespace App\Http\Controllers;

// use App\Repositories\Article\MasterProdukRepository;
use App\Http\Requests\TransaksiPembelianStoreRequest;
use App\Repositories\RepositoryInterface;
use App\Repositories\TransaksiPembelian\TransaksiPembelianRepository;
use Illuminate\Http\Request;
use League\Fractal\Manager;

class TransaksiPembelianController extends Controller
{
    /**
     * @var $repo TransaksiPembelianRepository
     */
    public $repo;

    public function __construct(TransaksiPembelianRepository $repo, Manager $fractal, Request $request)
    {
        parent::__construct($repo, $fractal, $request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('transaksi_pembelian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransaksiPembelianStoreRequest $request)
    {
        $this->repo->create($request->all());
        return redirect()->back()->with("message", "Success Saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
