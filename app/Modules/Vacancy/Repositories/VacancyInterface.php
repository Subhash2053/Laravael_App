<?php


namespace App\Modules\Employee\Repositories;


interface VacancyInterface
{
    public function findAll($limit, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function save($data);

    public function update($id,$role);

    public function delete($ids);

    public function changeStatus($id);

}