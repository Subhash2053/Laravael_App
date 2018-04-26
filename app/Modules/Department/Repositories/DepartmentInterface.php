<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 12/18/17
 * Time: 1:07 PM
 */

namespace App\Modules\Department\Repositories;


interface DepartmentInterface
{

    public function findAll($limit, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function findList();

    public function save($data);

    public function update($id,$role);

    public function delete($ids);

    public function changeStatus($id);


}