<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransaksiPenjualanStoreRequest;
use App\Repositories\RepositoryInterface;
use App\Repositories\TransaksiPenjualan\TransaksiPenjualanRepository;
use Illuminate\Http\Request;
use League\Fractal\Manager;

class TransaksiPenjualanController extends Controller
{
    /* @var $repo TransaksiPenjualanRepository **/
    public function __construct(TransaksiPenjualanRepository $repo, Manager $fractal, Request $request)
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
        return view('transaksi_penjualan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo "aaaa";die;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransaksiPenjualanStoreRequest $request)
    {
        $this->data = $this->repo->create($request->all());
//        dump($this->data);
//        die;
        return view('transaksi_penjualan.print',['data' => $this->data]);
        die;
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
