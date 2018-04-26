<?php

namespace App\Modules\User\Http\Controllers;

use App\Modules\User\Http\Requests\RoleFormRequest;
use App\Modules\User\Repositories\PermissionInterface;
use App\Modules\User\Repositories\RoleInterface;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class RoleController extends Controller
{

    private $role;

    private $permission;


    public function __construct(RoleInterface $role, PermissionInterface $permission)
    {
        $this->middleware('auth');
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $data['roles'] = $this->role->findAll();

        return view('user::role.index', $data);
    }

    public function create()
    {

        $data['routes'] = $this->getRouteList();

        return view('user::role.create', $data);
    }

    public function store(RoleFormRequest $request)
    {

        $role['name'] = $request->get('name');
        $role['sort_order'] = $request->get('sort_order');
        $roles = $request->get('route_name');
        try {
            $role = $this->role->save($role);
            if ($roles) {
                $this->permission->save($role->id, $roles);
            }

            Flash::success("Data Created Successfully");

        } catch (\Throwable $t) {

            Flash::error($t->getMessage());
        }

        return redirect(route('role.index'));

    }

    public function edit($id)
    {

        $data['role'] = $this->role->find($id);
        $data['routes'] = $this->getRouteList();
        $data['assignedRoutes'] = $this->permission->getList($roleId = $id)->toArray();


        return view('user::role.edit', $data);
    }

    public function update(RoleFormRequest $request, $id)
    {
        $role['name'] = $request->get('name');
        $role['sort_order'] = $request->get('sort_order');
        $roles = $request->get('route_name');
        try {
            $this->role->update($id, $role);
            $this->permission->deleteByGroup($roleId = $id);
            if ($roles) {
                $this->permission->save($roleId = $id, $roles);
            }

            Flash::success("Data Updated Successfully");

        } catch (\Throwable  $t) {
            Flash::error($t->getMessage());
        }

        return redirect(route('role.edit', ['id' => $id]));
    }

    public function destroy($id)
    {
        try {
            $this->role->delete($id);
            Flash::success("Data deleted Successfully");
        } catch (\Throwable  $t) {

            Flash::error($t->getMessage());
        }

        return redirect(route('role.index'));
    }

    private function getRouteList()
    {
        $app = app();
        $collection = $app->routes->getRoutes();
        $routeList = [];
        $hiddenRoutes = [
            'login',
            'role.index',
            'role.create',
            'role.destroy',
            'role.update',
            'dashboard',
            'image.serve',
            'logout',
            'role.store',
            'role.edit',
            'login-post',
            'permission.denied'
        ];

        foreach ($collection as $routes) {

            if ($routes->getName() != null && !in_array($routes->getName(), $hiddenRoutes)) {
                $list = str_replace('.', ' ', $routes->getName());
                $routeList[$routes->getName()] = ucfirst(str_replace('destroy', 'delete',
                    str_replace('index', 'list', $list)));
            }

        }

        return $routeList;
    }

    public function status(Request $request)
    {

        try {
            if ($request->ajax()) {
                $stat = null;
                $id = $request->input('id');

                $status = $this->role->changeStatus($id);
                if ($status == 0) {
                    $stat = '<i class="fa fa-toggle-off fa-2x text-danger-800"></i>';
                } elseif ($status == 1) {
                    $stat = '<i class="fa fa-toggle-on fa-2x text-success-800"></i>';
                }
                $data['tgle'] = $stat;
            }

        } catch (\Throwable $e) {

            $data['error'] = $e->getMessage();
        }

        return response()->json($data);
    }


}
