<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransaksiKeluarStore;
use App\Repositories\RepositoryInterface;
use App\Repositories\TransaksiKeluar\TransaksiKeluarRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Fractal\Manager;

/**
 * Class TransaksiKeluarController
 * @package App\Http\Controllers
 */
class TransaksiKeluarController extends Controller
{
    /**
     * @var null
     */
    protected $data;

    /**
     * TransaksiKeluarController constructor.
     * @param TransaksiKeluarRepository $repo
     * @param Manager $fractal
     * @param Request $request
     */
    public function __construct(TransaksiKeluarRepository $repo, Manager $fractal, Request $request)
    {
        parent::__construct($repo, $fractal, $request);
        $this->data = null;
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->data = null;
        return view('transaksi_keluar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransaksiKeluarStore $request)
    {
        //
        $this->data = $this->repo->create($request->all());
        return redirect()->back()->with("message", "Success Saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiKeluar  $transaksiKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiKeluar $transaksiKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiKeluar  $transaksiKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiKeluar $transaksiKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiKeluar  $transaksiKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiKeluar $transaksiKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiKeluar  $transaksiKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiKeluar $transaksiKeluar)
    {
        //
    }
}
