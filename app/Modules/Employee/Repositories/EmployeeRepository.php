<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 12/19/17
 * Time: 2:50 PM
 */

namespace App\Modules\Employee\Repositories;
use App\Modules\Employee\Models\Employee;

class EmployeeRepository implements EmployeeInterface
{

    private static $path = '/assets/uploads/employee';


    public function findAll($limit, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = Employee::when(array_keys($filter, true), function ($query) use ($filter) {
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
        return Employee::find($id);
    }

    public function save($data)
    {
        $data['status'] = 1;

        return Employee::create($data);
    }

    public function update($id, $data)
    {
        $employee = Employee::find($id);

        return $employee->update($data);
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
        return Employee::destroy($ids);
    }

    public function changeStatus($id)
    {
        $status = $this->getStatus($id);
        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }
        $row = Employee::find($id);
        $row->status = $stat;
        if ($row->save()) {
            return $this->getStatus($id);

        } else {
            return false;
        }
    }

    private function getStatus($id)
    {

        $row = Employee::find($id);

        return $row->status;
    }

}