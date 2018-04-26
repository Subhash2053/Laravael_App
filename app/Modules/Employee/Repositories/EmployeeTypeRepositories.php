<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 1/3/18
 * Time: 3:55 PM
 */

namespace App\Modules\Employee\Repositories;


use App\Modules\Employee\Models\EmployeeType;

class EmployeeTypeRepositories implements EmployeeTypeInterface
{

    public function findAll($limit= 99999, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = EmployeeType::when(array_keys($filter, true), function ($query) use ($filter) {
            $query->where('name', 'like', '%' . $filter['name'] . '%');

            return $query;
        })
            ->whereIn('status', $status)
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate($limit ? $limit : env('DEF_PAGE_LIMIT'));

        return $result;

    }

    public function find($id)
    {
        return EmployeeType::find($id);
    }

    public function save($data)
    {
        $data['status'] = 1;

        return EmployeeType::create($data);
    }

    public function update($id, $data)
    {
        $employeetype = EmployeeType::find($id);

        return $employeetype->update($data);
    }

    public function upload($file)
    {
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . self::$path, $fileName);

        return $fileName;
    }

    public function delete($ids)
    {
        return EmployeeType::destroy($ids);
    }

    public function changeStatus($id)
    {
        $status = $this->getStatus($id);
        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }
        $row = EmployeeType::find($id);
        $row->status = $stat;
        if ($row->save()) {
            return $this->getStatus($id);

        } else {
            return false;
        }
    }

    private function getStatus($id)
    {

        $row = EmployeeType::find($id);

        return $row->status;
    }

}