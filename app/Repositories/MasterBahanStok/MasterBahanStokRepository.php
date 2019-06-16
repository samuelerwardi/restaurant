<?php


namespace App\Repositories\MasterBahanStok;


use App\MasterBahanStok;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class MasterBahanStokRepository implements RepositoryInterface
{

    public function all(array $columns = ['*'])
    {
        // TODO: Implement all() method.
        $from = app('request')->get('from');
        $to = app('request')->get('from');
        $limit = app('request')->get('limit');
        $page = app('request')->get('page');
        $result = MasterBahanStok::filterCreateAtFrom($from)->filterCreateAtTo($to);
        return $result->get();
    }

    public function paginate(int $perPage = 15, $columns = ['*'])
    {
        // TODO: Implement paginate() method.
    }

    public function create(array $data): Model
    {
        // TODO: Implement create() method.
        $result = MasterBahanStok::create($data);
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
            $result = MasterBahanStok::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            throw new \App\Exceptions\ModelNotFoundException;
        }
        return $result;
    }

    public function findBy(string $field, string $value, $columns = ['*'])
    {
        // TODO: Implement findBy() method.
        try {
            $from = app('request')->get('from');
            $to = app('request')->get('from');
            $limit = app('request')->get('limit');
            $page = app('request')->get('page');
            $result = MasterBahanStok::where($field, $value)->filterCreateAtFrom($from)->filterCreateAtTo($to);
            return $result->get();
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            throw new \App\Exceptions\ModelNotFoundException;
        }
        return $results;
    }

    public function sumQtyByMasterBahansId($master_bahans_id){
        $results = MasterBahanStok::SumQtyByMasterBahansId($master_bahans_id);
        return $results->first();
    }

    public function sumQtyAll($request){
        return MasterBahanStok::SumQtyAll($request)->get();
    }
}