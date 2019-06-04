<?php


namespace App\Repositories\TransaksiPembelian;


use App\Repositories\RepositoryInterface;
use App\Repositories\TransaksiPembelianDetails\TransaksiPembelianDetailsRepository;
use App\TransaksiPembelian;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembelianRepository implements RepositoryInterface
{

//    /* @var $transaksiPembelianDetails \App\Repositories\TransaksiPembelian\TransaksiPembelianDetailsRepository */
    public $transaksiPembelianDetailsRepository;

    public function __construct(TransaksiPembelianDetailsRepository $transaksiPembelianDetailsRepository)
    {
        $this->transaksiPembelianDetailsRepository = $transaksiPembelianDetailsRepository;
    }
    public function all(array $columns = ['*'])
    {
        // TODO: Implement all() method.
        return TransaksiPembelian::all();
    }

    public function paginate(int $perPage = 15, $columns = ['*'])
    {
        // TODO: Implement paginate() method.
    }

    public function create(array $data): Model
    {
        // TODO: Implement create() method.
        $result = TransaksiPembelian::create($data["transaksi_pembelian"]);

        if ($result){
            foreach ($data["transaksi_pembelian_details"] as $key => $value) {
                $details = array_merge($value, array("transaksi_pembelian_id" => $result->getAttribute("id")));
                $resultDetail = $this->transaksiPembelianDetailsRepository->create($details);
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
        // TODO: Implement find() method.
        try {
            $result = TransaksiPembelian::findOrFail($id);
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