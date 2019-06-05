<?php

namespace App\Repositories\MasterBahan;

use App\MasterBahan;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class MasterBahanRepository implements RepositoryInterface
{
    public function all(array $columns = ['*'])
    {
        // TODO: Implement all() method.
        return MasterBahan::allSearch(app('request'));

    }

    public function paginate(int $perPage = 15, $columns = ['*'])
    {
        // TODO: Implement paginate() method.
    }

    public function create(array $data): Model
    {
        // TODO: Implement create() method.
        $result = MasterBahan::create($data);
        return $result;
    }

    public function update(array $data, int $id)
    {
        // TODO: Implement update() method.
        $find = $this->find($id);
        $result = $find->update($data);
        if ($result){
            $result = $this->find($id);
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
        $result = MasterBahan::destroy($id);
        return $result;
    }

    public function find(int $id, $columns = array('*'))
    {
        // TODO: Implement find() method.
        try {
            $result = MasterBahan::findOrFail($id);
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