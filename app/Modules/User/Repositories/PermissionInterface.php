<?php


namespace App\Modules\User\Repositories;


interface PermissionInterface
{

    public function findAll($limit = 9999999, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function save($roleId, $data);

    public function update($id, $data);

    public function getList($roleId);

    public function deleteByGroup($roleId);


}
