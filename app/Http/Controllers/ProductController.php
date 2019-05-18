<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsStoreRequest;
use App\MasterProduk;
use App\Repositories\MasterProduk\MasterProdukRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(MasterProdukRepository $masterProdukRepository) {
        $this->repo = $masterProdukRepository;
        $this->data = null;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->data['datas'] = $this->repo->all();
        return view('product.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsStoreRequest $request)
    {
        //
        $product = $this->repo->create($request->all());
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
     * @param  \App\MasterProduk  $masterProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterProduk $masterProduk)
    {
        //
        dump($masterProduk->getAttribute("id"));
        die;
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
