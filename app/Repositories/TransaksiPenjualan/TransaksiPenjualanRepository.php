<?php


namespace App\Repositories\TransaksiPenjualan;


use App\Repositories\MasterBahanStok\MasterBahanStokRepository;
use App\Repositories\MasterProdukReseps\MasterProdukReseps;
use App\Repositories\RepositoryInterface;
use App\Repositories\TransaksiPenjualanDetails\TransaksiPenjualanDetailsRepository;
use App\TransaksiPenjualan;
use App\TransaksiPenjualanDetails;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class TransaksiPenjualanRepository implements RepositoryInterface
{
    public function __construct(TransaksiPenjualanDetailsRepository $transaksiPenjualanDetailsRepository, MasterProdukReseps $masterProdukReseps, MasterBahanStokRepository $masterBahanStokRepository)
    {
        $this->transaksiPenjualanDetailsRepository = $transaksiPenjualanDetailsRepository;
        $this->masterProdukReseps = $masterProdukReseps;
        $this->masterBahanStokRepository = $masterBahanStokRepository;
    }

    public function all(array $columns = ['*'])
    {
        // TODO: Implement all() method.
        //         // TODO: Implement all() method.
        $from = app('request')->get('from');
        $to = app('request')->get('from');
        $limit = app('request')->get('limit');
        $page = app('request')->get('page');
        $result = TransaksiPenjualan::filterCreateAtFrom($from)->filterCreateAtTo($to);
        return $result->get();
    }

    public function paginate(int $perPage = 15, $columns = ['*'])
    {
        // TODO: Implement paginate() method.
    }

    public function create(array $data): Model
    {
        // TODO: Implement create() method.
        $result = TransaksiPenjualan::create($data["transaksi"]);
        if ($result instanceof TransaksiPenjualan){
            foreach ($data["transaksi_details"] as $key => $value) {
                $details = array_merge($value, array("transaksi_penjualan_id" => $result->getAttribute("id")));
                $resultDetail = $this->transaksiPenjualanDetailsRepository->create($details);
                $repoResep = $this->masterProdukReseps->findBy("master_produk_id",$value["master_produks_id"]);
                if (!empty($repoResep)){
                    foreach ($repoResep as $keyResep => $valueResep){
                        $master_bahans_stok["master_bahans_id"] = $valueResep->getAttribute("master_bahan_id");
                        $master_bahans_stok["qty"] = "-".$valueResep->getAttribute("qty");
                        $master_bahans_stok["created_at"] = Carbon::now();
                        $master_bahans_stok["class"] = Route::currentRouteName();
                        $result_stok = $this->masterBahanStokRepository->create($master_bahans_stok);
                    }
                }
            }
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
            $result = TransaksiPenjualan::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            throw new \App\Exceptions\ModelNotFoundException;
        }
        return $result;
    }

    public function findBy(string $field, string $value, $columns = ['*'])
    {
        // TODO: Implement findBy() method.
    }

}