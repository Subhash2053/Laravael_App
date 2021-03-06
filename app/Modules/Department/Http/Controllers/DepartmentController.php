<?php

namespace App\Modules\Department\Http\Controllers;

use App\Modules\Department\Http\Requests\DepartmentFormRequest;
use App\Modules\Department\Models\Department;
use App\Modules\Department\Repositories\DepartmentInterface;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class DepartmentController extends Controller
{

    protected $department;

    public function __construct(DepartmentInterface $department)
    {
        $this->middleware('auth');
        $this->department = $department;
    }

    public function index(Request $request)
    {
       $departments= Department::paginate(8);
       $json=json_encode($departments);
       //dd($json);

        return view('department::index',compact('departments','json'));
    }

    public function create()
    {
        return view('department::create');
    }

    public function store(DepartmentFormRequest $request)
    {
        $input = $request->all();
        //dd($input);


        try {
            $this->department->save($input);
            Flash::success("Department Created Successfully");

        } catch (\Throwable $e) {

            Flash::error($e->getMessage());
        }

        return redirect(route('department.index'));
    }


    public function edit($id)
    {
        $department = $this->department->find($id);

        return view('department::edit', compact('department'));
    }



    public function destroy(Request $request)
    {
        $ids = $request->all();
        //dd($ids);

        try {
            if ($request->has('toDelete')) {
                $this->department->delete($ids['toDelete']);
                Flash::success("Department deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('department.index'));
    }
    public function delete($id)
    {

        try {
            if ($id) {
                $this->department->delete($id);
                Flash::success("Department deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('banner.index'));
    }


   public function update(DepartmentFormRequest $request, $id)
    {

        try {

            $input = $request->all();
            $this->department->update($id, $input);

            Flash::success("Department Updated Successfully");

            return redirect(route('department.edit', ['id' => $id]));

        } catch (Throwable $e) {

            Flash::error($e->getMessage());

        }
    }








}
