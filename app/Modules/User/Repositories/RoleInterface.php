<?php


namespace App\Modules\User\Repositories;


interface RoleInterface
{

    public function findAll($limit = 9999999, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function save($data);

    public function update($id, $data);

    public function delete($ids);

    public function changeStatus($id);

}
