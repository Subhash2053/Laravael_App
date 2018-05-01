<?php


namespace App\Modules\Vacancy\Repositories;

use App\Modules\Vacancy\Repositories\VacancyInterface;

class VacancyRepository implements VacancyInterface
{

    private static $path = '/assets/uploads/vacancy';


    public function findAll($limit, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = Vacancy::when(array_keys($filter, true), function ($query) use ($filter) {
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
        return Vacancy::find($id);
    }

    public function save($data)
    {
        $data['status'] = 1;

        return Vacancy::create($data);
    }

    public function update($id, $data)
    {
        $Vacancy = Vacancy::find($id);

        return $Vacancy->update($data);
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
        return Vacancy::destroy($ids);
    }

    public function changeStatus($id)
    {
        $status = $this->getStatus($id);
        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }
        $row = Vacancy::find($id);
        $row->status = $stat;
        if ($row->save()) {
            return $this->getStatus($id);

        } else {
            return false;
        }
    }

    private function getStatus($id)
    {

        $row = Vacancy::find($id);

        return $row->status;
    }

}