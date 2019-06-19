<?php


namespace App\Repositories\TransaksiKeluar;


use App\Repositories\MasterBahanStok\MasterBahanStokRepository;
use App\Repositories\RepositoryInterface;
use App\Repositories\TransaksiPembelianDetails\TransaksiPembelianDetailsRepository;
use App\TransaksiKeluar;
use App\TransaksiPembelian;
use Illuminate\Database\Eloquent\Model;

class TransaksiKeluarRepository implements RepositoryInterface
{

    public function __construct()
    {

    }

    public function all(array $columns = ['*'])
    {
        // TODO: Implement all() method.
        $from = app('request')->get('from');
        $to = app('request')->get('from');
        $limit = app('request')->get('limit');
        $page = app('request')->get('page');
        $result = TransaksiKeluar::filterCreateAtFrom($from)->filterCreateAtTo($to)->get();
        return $result;
    }

    public function paginate(int $perPage = 15, $columns = ['*'])
    {
        // TODO: Implement paginate() method.
    }

    public function create(array $data): Model
    {
        // TODO: Implement create() method.
        $result = TransaksiKeluar::create($data);

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
            $result = TransaksiKeluar::findOrFail($id);
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