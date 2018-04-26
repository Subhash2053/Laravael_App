<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 12/18/17
 * Time: 1:08 PM
 */

namespace App\Modules\Department\Repositories;

use App\Modules\Department\Models\Department;

class DepartmentRepository implements DepartmentInterface
{
    public function findAll($limit, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = Department::when(array_keys($filter, true), function ($query) use ($filter) {
            $query->where('title', 'like', '%' . $filter['title'] . '%');

            return $query;
        })
            ->whereIn('status', $status)
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate($limit ? $limit : env('DEF_PAGE_LIMIT'));

        return $result;

    }

    public function find($id)
    {
        return Department::find($id);
    }

    public function findList()
    {
        return Department::pluck('title', 'id');
    }

    public function save($data)
    {
        $data['status'] = 1;

        return Department::create($data);
    }

    public function update($id, $data)
    {
        $banner = Department::find($id);

        return $banner->update($data);
    }

    public function delete($ids)
    {
        return Department::destroy($ids);
    }

    public function changeStatus($id)
    {
        $status = $this->getStatus($id);
        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }
        $row = Department::find($id);
        $row->status = $stat;
        if ($row->save()) {
            return $this->getStatus($id);

        } else {
            return false;
        }
    }

    private function getStatus($id)
    {

        $row = Department::find($id);

        return $row->status;
    }

}