<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasterBahanStore;
use App\Http\Requests\MasterBahanUpdate;
use App\MasterBahan;

use App\Repositories\MasterBahan\MasterBahanRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;
use League\Fractal\Manager;

class MasterBahanController extends Controller
{
    public function __construct(MasterBahanRepository $repo, Manager $fractal, Request $request)
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
        $this->data = $this->repo->all();
        return view("master_bahan.index", ["datas" => $this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->data = $this->repo->all();
        return view("master_bahan.create", ["datas" => $this->data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MasterBahanStore $request)
    {
        //
        $this->data = $this->repo->create($request->all());
        return redirect()->back()->with("message", "Success Saved");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\MasterBahan $masterBahan
     * @return \Illuminate\Http\Response
     */
    public function show(MasterBahan $masterBahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\MasterBahan $masterBahan
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterBahan $masterBahan)
    {
        //
        dump($masterBahan);
        die;
        $this->data = $this->repo->find($masterBahan->getAttribute("id"));
        return view("master_bahan.edit", ["datas" => $this->data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\MasterBahan $masterBahan
     * @return \Illuminate\Http\Response
     */
    public function update(MasterBahanUpdate $request, MasterBahan $masterBahan)
    {
        //

        $this->data = $this->repo->update($request->all(),$masterBahan["id"]);
        return redirect()->back()->with("message", "Success Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\MasterBahan $masterBahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterBahan $masterBahan)
    {
        //
        $this->repo->delete($masterBahan->getAttribute("id"));
        die;
    }

    public function list(){
        $json = array();
        $this->data = $this->repo->all();
        foreach ($this->data as $key => $value){
            array_push($json,array("id" => $value["id"], "text" => $value["nama_bahan"]));
        }
//        dump($json);
//        die;
        return response()->json(array("results" => $json));
    }
}
