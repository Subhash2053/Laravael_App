<?php

namespace App\Modules\User\Repositories;

use App\Modules\User\Models\User;
use App\Modules\User\Models\Role;
use Illuminate\Support\Facades\Auth;


class RoleRepository implements RoleInterface
{


    public function findAll($limit = 9999999, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = Role::when(array_keys($filter, true), function ($query) use ($filter) {
            $query->where('title', 'like', '%' . $filter['title'] . '%');

            return $query;
        })
            ->whereIn('status', $status)
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate(env('DEF_PAGE_LIMIT', $limit));

        return $result;
    }


    public function find($id)
    {
        return Role::find($id);
    }

    public function getCreatedByName($created_by_id)
    {
        $createdBy = User::find($created_by_id)->get();


        return $createdBy['id'];
    }

    public function save($data)
    {

        $data['status'] = 1;
        $data['created_by_id'] = Auth::user()->id;

        return Role::create($data);
    }


    public function update($id, $data)
    {
        $Role = Role::find($id);

        return $Role->update($data);
    }


    public function delete($ids)
    {
        return Role::destroy($ids);
    }


    public function changeStatus($id)
    {
        $status = $this->getStatus($id);

        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }

        $row = Role::find($id);
        $row->status = $stat;

        if ($row->save()) {

            return $this->getStatus($id);

        } else {

            return false;
        }
    }

    public function getStatus($id)
    {
        $row = Role::find($id);

        return $row->status;
    }

} 
