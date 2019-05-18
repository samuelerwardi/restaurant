<?php

namespace App\Repositories\MasterProduk;

use App\MasterProduk;
use App\Repositories\MasterProdukReseps\MasterProdukReseps;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class MasterProdukRepository implements RepositoryInterface
{
    public function __construct(MasterProdukReseps $masterProdukReseps)
    {
        $this->masterProdukReseps = $masterProdukReseps;
    }

    public function all(array $columns = ['*'])
    {
        // TODO: Implement all() method.
        return MasterProduk::all();

    }

    public function paginate(int $perPage = 15, $columns = ['*'])
    {
        // TODO: Implement paginate() method.
    }

    public function create(array $data): Model
    {
        // TODO: Implement create() method.
        $result = MasterProduk::create($data["master_produks"]);
//        dump($data["master_produk_reseps"]);
//        dump($result);
//        die;

        if ($result){
            foreach ($data["master_produk_reseps"] as $key => $value){
                $master_produk_reseps = array_merge($value, array("master_produk_id" => $result->getAttribute("id")));
                $resultDetail = $this->masterProdukReseps->create($master_produk_reseps);
//                dump($resultDetail);
            }
            $result = $this->find($result->getAttribute("id"));
        }
        return $result;
    }

    public function update(array $data, int $id)
    {
        // TODO: Implement update() method.
    }

    public function updateBy(string $field, string $value, array $data)
    {
        // TODO: Implement updateBy() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    public function find(int $id, $columns = array('*'))
    {
        // TODO: Implement find() method.
        try {
            $result = MasterProduk::findOrFail($id);
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            throw new \App\Exceptions\ModelNotFoundException;
        }

        return $result;
    }

    public function findBy(string $field, string $value, $columns = ['*'])
    {
        // TODO: Implement findBy() method.
    }

}