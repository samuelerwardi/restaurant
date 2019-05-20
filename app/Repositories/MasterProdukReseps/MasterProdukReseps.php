<?php


namespace App\Repositories\MasterProdukReseps;


use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class MasterProdukReseps implements RepositoryInterface
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
        $result = \App\MasterProdukReseps::create($data);
        return $result;
        // TODO: Implement create() method.
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
        $result = \App\MasterProdukReseps::destroy($id);
        return $result;
    }

    public function find(int $id, $columns = array('*'))
    {
        // TODO: Implement find() method.
    }

    public function findBy(string $field, string $value, $columns = ['*'])
    {
        // TODO: Implement findBy() method.
        try {
            $results = \App\MasterProdukReseps::where($field, $value)->get();
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            throw new \App\Exceptions\ModelNotFoundException;
        }
        return $results;
    }
}