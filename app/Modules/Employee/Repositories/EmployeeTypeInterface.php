<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 1/3/18
 * Time: 3:56 PM
 */

namespace App\Modules\Employee\Repositories;


interface EmployeeTypeInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function save($data);

    public function update($id,$role);

    public function delete($ids);

    public function changeStatus($id);
}