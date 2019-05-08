<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function all(array $columns = ['*']);
 
    public function paginate(int $perPage = 15, $columns = ['*']);
 
    public function create(array $data): Model;
 
    public function update(array $data, int $id);

    public function updateBy(string $field, string $value, array $data);
 
    public function delete(int $id);
 
    public function find(int $id, $columns = array('*'));
 
    public function findBy(string $field, string $value, $columns = ['*']);
}
