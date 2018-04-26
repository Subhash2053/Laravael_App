<?php

namespace App\Modules\User\Repositories;

use App\Modules\User\Models\Permission;
use App\Modules\User\Models\Role;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Auth;


class PermissionRepository implements PermissionInterface
{


    public function findAll($limit = 9999999, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = Permission::when(array_keys($filter, true), function ($query) use ($filter) {
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
        return Permission::find($id);
    }

    public function getCreatedByName($created_by_id)
    {
        $createdBy = User::find($created_by_id)->get();


        return $createdBy['id'];
    }

    public function save($roleId, $data)
    {
        $role = Role::find($roleId);
        $permission = [];

        foreach ($data as $key => $row) {

            $permission[] = [
                'route_name' => $row
            ];

        }

        $role->permission()->createMany($permission);

    }

    public function getList($roleId)
    {
        return Permission::where('role_id', $roleId)->pluck('route_name');
    }


    public function update($id, $data)
    {
        $Permission = Permission::find($id);

        return $Permission->update($data);
    }


    public function deleteByGroup($roleId)
    {
        $permissions = Permission::where('role_id', $roleId)->get();
        foreach ($permissions as $permission) {
            Permission::destroy($permission->id);
        }
    }


}
