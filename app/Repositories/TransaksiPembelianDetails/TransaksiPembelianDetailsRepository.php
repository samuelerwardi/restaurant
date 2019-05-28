<?php


namespace App\Repositories\TransaksiPembelianDetails;


use App\Repositories\RepositoryInterface;
use App\TransaksiPembelian;
use App\TransaksiPembelianDetails;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembelianDetailsRepository implements RepositoryInterface
{
    public function all(array $columns = ['*'])
    {
        // TODO: Implement all() method.
    }

    public function paginate(int $perPage = 15, $columns = ['*'])
    {
        // TODO: Implement paginate() method.
    }

    public function create(array $data): Model
    {
        // TODO: Implement create() method.
        $result = TransaksiPembelianDetails::create($data);
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
    }

    public function findBy(string $field, string $value, $columns = ['*'])
    {
        // TODO: Implement findBy() method.
    }

}