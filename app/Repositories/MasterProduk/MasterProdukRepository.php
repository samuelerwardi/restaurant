<?php

namespace App\Repositories\MasterProduk;

use App\MasterProduk;
use App\Repositories\MasterBahanStok\MasterBahanStokRepository;
use App\Repositories\MasterProdukReseps\MasterProdukReseps;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class MasterProdukRepository implements RepositoryInterface
{
    /* @var $masterProdukReseps \App\Repositories\MasterBahanStok\MasterBahanStokRepository */
    private $masterProdukReseps;
    /* @var $masterBahanStokRepository \App\Repositories\MasterBahanStok\MasterBahanStokRepository */
    private $masterBahanStokRepository;

    public function __construct(MasterProdukReseps $masterProdukReseps, MasterBahanStokRepository $masterBahanStokRepository)
    {
        $this->masterProdukReseps = $masterProdukReseps;
        $this->masterBahanStokRepository = $masterBahanStokRepository;
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

        if ($result) {
            foreach ($data["master_produk_reseps"] as $key => $value) {
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
        $find = $this->find($id);

        $result = $find->update($data["master_produks"]);
        if ($result) {
            $master_produk_reseps_delete = $this->masterProdukReseps->findBy("master_produk_id", $id);
            if ($master_produk_reseps_delete instanceof Collection) {
                foreach ($master_produk_reseps_delete as $key => $value) {
                    $this->masterProdukReseps->delete($value["id"]);
                }
            }

            foreach ($data["master_produk_reseps"] as $key => $value) {
                $master_produk_reseps = array_merge($value, array("master_produk_id" => $id));
                $resultDetail = $this->masterProdukReseps->create($master_produk_reseps);
            }
            $result = $this->find($id);
        } else {
            $result = false;
        }
        return $result;
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
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            throw new \App\Exceptions\ModelNotFoundException;
        }

        return $result;
    }

    public function findBy(string $field, string $value, $columns = ['*'])
    {
        // TODO: Implement findBy() method.
    }

    public function validate_stok(array $data)
    {
        $result = ["success" => [], "errors" => []];
        $product = $this->find($data["id"]);
        if (!empty($product->getMasterProdukReseps())) {
            foreach ($product->getMasterProdukReseps() as $key => $value) {
                $stok_bahan = $this->masterBahanStokRepository->sumQtyByMasterBahansId($value->getAttribute("master_bahan_id"));
                if (!empty($stok_bahan) && $stok_bahan->qty >= ($value->qty * $data["qty"])) {
                    $result['success'][] = $value->id;
                } else {
                    $result['errors'][] = $value->id;
                }
            }
        }
        return $result;
    }

    public function findLike(string $search, $columns = array('*'))
    {
        // TODO: Implement find() method.
        try {
            $result = MasterProduk::where("produk_nama", 'like', '%' . $search . '%')->orWhere("produk_kode", 'like', '%' . $search . '%')->get();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            throw new \App\Exceptions\ModelNotFoundException;
        }

        return $result;
    }

}