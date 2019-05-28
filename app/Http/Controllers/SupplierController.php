<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierStoreRequest;
use App\Repositories\RepositoryInterface;
use App\Repositories\Supplier\SupplierRepository;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\View\View;
use League\Fractal\Manager;

class SupplierController extends Controller
{
    public function __construct(SupplierRepository $repo, Manager $fractal, Request $request)
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
        $this->data = $this->repo->all();
        return View("supplier.index", ["datas" => $this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View("supplier.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierStoreRequest $request)
    {
        //
        $this->data = $this->repo->create($request->all());
        return redirect()->back()->with("message", "Success Saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
        $this->data = $this->repo->find($supplier->getAttribute("id"));
        return View("supplier.edit", ["datas" => $this->data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
        $this->data = $this->repo->update($request->all(),$supplier["id"]);
        return redirect()->back()->with("message", "Success Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
        $this->repo->delete($supplier->getAttribute("id"));
        return redirect()->back()->with("message", "Success Deleted");
    }

    public function search(){
        $this->data = $this->repo->all();
        return response()->json($this->data);
    }
}
