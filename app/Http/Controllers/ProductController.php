<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsStoreRequest;
use App\Http\Requests\ProductsUpdateRequest;
use App\Http\Requests\TransaksiPenjualanValidateStokRequest;
use App\MasterProduk;
use App\Product;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterProduk $product)
    {
        //
        $this->data = $this->repo->find($product->getAttribute("id"));
        //dump($this->data->getMasterProdukReseps());
        return view("product.edit", ["datas" => $this->data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsUpdateRequest $request, MasterProduk $product)
    {
        //
        $this->data = $this->repo->update($request->all(),$product["id"]);
        return redirect()->back()->with("message", "Success Updated");
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

    public function search(){
        $this->data = $this->repo->all();
        return response()->json($this->data);
    }

    public function validate_stok(TransaksiPenjualanValidateStokRequest $request){
        $this->data = $this->repo->validate_stok($request->all());
        return response()->json($request->all());
    }
}
