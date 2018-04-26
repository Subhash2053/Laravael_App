<?php

namespace App\Modules\User\Repositories;


use App\Modules\User\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;


class UserRepository implements UserInterface
{

    const USER_FIELD = 'admin';

    private static $path = '/app/userProfile';

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = User::when(array_keys($filter, true), function ($query) use ($filter) {
            $query->where('title', 'like', '%' . $filter['title'] . '%');

            return $query;
        })
            ->whereIn('status', $status)
            ->whereNotIn('user_type', ['super_admin', 'user'])
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate(env('DEF_PAGE_LIMIT', $limit));

        return $result;
    }

    public function findAllWithAdmin($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = User::when(array_keys($filter, true), function ($query) use ($filter) {
            $query->where('title', 'like', '%' . $filter['title'] . '%');

            return $query;
        })
            ->whereIn('status', $status)
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate(env('DEF_PAGE_LIMIT', $limit));

        return $result;
    }

    public function findAllStudent(
        $limit = null,
        $filter = [],
        $sort = ['by' => 'id', 'sort' => 'DESC'],
        $status = [0, 1]
    ) {
        $result = User::when(array_keys($filter, true), function ($query) use ($filter) {
            $query->where('title', 'like', '%' . $filter['title'] . '%');

            return $query;
        })
            ->whereIn('status', $status)
            ->where('user_type', 'user')
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate(env('DEF_PAGE_LIMIT', $limit));

        return $result;
    }

    public function save($data)
    {

        $data['password'] = Hash::make($data['password']);
        $data['user_field'] = self::USER_FIELD;

        try {

            $user = User::create($data);
            $user = User::find($user->id);

            // Attach Role
            foreach ($data['roles'] as $val) {
                $user->assignRole($val);
            }


            /*foreach ($data['permissions'] as $val) {
                $user->givePermissionTo($val);
            }*/

        } catch (Exception $e) {

        }

        return true;

    }

    public function create($data)
    {
        $data['created_by_id'] = Auth::user() ? Auth::user()->id : null;
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }

    public function saveSocialUser($data, $identifier)
    {
        $user = User::where('social_id', $identifier)->first();

        if ($user) {
            $user->update($data);

            return $user;
        } else {
            return User::create($data);
        }
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function checkMobile($mobile, $code)
    {
        $user = User::where('mobile', $mobile)
            ->where('mobile_verification_code', $code)
            ->first();

        if ($user) {

            $user->verified = 1;
            $user->save();

            return true;

        } else {
            return false;
        }
    }

    public function getRoles()
    {
        return Role::lists('name', 'name');
    }

    public function upload($file)
    {
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . self::$path, $fileName);

        return $fileName;
    }

    public function getPermissions()
    {
        return Permission::lists('name', 'name');
    }

    public function update($userId, $data)
    {
        $user = User::find($userId);

        return $user->update($data);
    }

    public function getTotal()
    {
        $user = User::where('user_field', '<>', 'admin')->get();

        return $user;
    }

    public function changeStatus($id)
    {
        $status = $this->getStatus($id);

        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }
        $row = User::find($id);
        $row->status = $stat;

        if ($row->save()) {
            return $this->getStatus($id);
        } else {
            return false;
        }
    }

    private function getStatus($id)
    {
        $row = User::find($id);

        return $row->status;
    }

    public function delete($ids)
    {
        return User::destroy($ids);
    }

}
