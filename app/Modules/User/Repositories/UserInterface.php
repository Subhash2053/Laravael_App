<?php

namespace App\Modules\User\Repositories;


interface UserInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);
    public function  findAllWithAdmin($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function create($data);

    public function upload($file);

    public function checkMobile($mobile, $code);

    public function saveSocialUser($data, $identifier);

    public function update($id, $data);

    public function getTotal();

    public function changeStatus($id);

    public function delete($ids);
}
