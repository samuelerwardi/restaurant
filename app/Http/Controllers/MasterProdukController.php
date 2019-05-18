<?php

namespace App\Http\Controllers;

use App\MasterProduk;
use App\Repositories\MasterProduk\MasterProdukRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;
use League\Fractal\Manager;

class MasterProdukController extends Controller
{
    public function __construct(MasterProdukRepository $repo, Manager $fractal, Request $request)
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterProduk  $masterProduk
     * @return \Illuminate\Http\Response
     */
    public function show(MasterProduk $masterProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterProduk  $masterProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterProduk $masterProduk)
    {
        echo "aaa";
        //
        dump($masterProduk->getAttribute("id"));
        die;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterProduk  $masterProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterProduk $masterProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterProduk  $masterProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterProduk $masterProduk)
    {
        //
    }
}
