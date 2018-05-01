<?php

namespace App\Modules\Employee\Http\Controllers;

use App\Modules\Department\Models\Department;

use App\Modules\Department\Repositories\DepartmentInterface;
use App\Modules\Employee\Http\Requests\EmployeeFormRequest;
use App\Modules\Employee\Models\Availability;
use App\Modules\Employee\Models\Employee;
use App\Modules\Employee\Repositories\EmployeeInterface;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class EmployeeController extends Controller
{

    protected $employee;
    protected $department;
    protected $availability;

    public function __construct(EmployeeInterface $employee, DepartmentInterface $department)
    {
        $this->middleware('auth');
        $this->employee = $employee;
        $this->department = $department;

    }

    public function index(Request $request)
    {
       $employees= Employee::paginate(8);


        return view('employee::index',compact('employees'));
    }
    public function create()
    {
        $departments=Department::all();
        $data['departments'] = $this->department->findList();
        //dd($departments->title);



        return view('employee::create',$data);
    }
    public function store(EmployeeFormRequest $request)
    {
        $input = $request->all();

        try {

            $employee = $this->employee->save($input);

            for ($i = 0; $i < count($input['available_day']); $i++) {

                $availabilities[$i] = new Availability([
                    'day' => $input['available_day'][$i],
                    'time' => $input['available_time'][$i]
                ]);

            }

            $employee->availabilities()->saveMany($availabilities);

            flash('Employee Created Successfully')->success();

        } catch (\Throwable $e) {

            flash($e->getMessage())->error();
            // Flash::error($e->getMessage());
        }

        return redirect(route('employee.index'));
    }
    public function edit($id)
    {
        $data['employee'] = $this->employee->find($id);

        $data['departments'] = $this->department->findList();

        return view('employee::edit', $data);
    }

    public function update(EmployeeFormRequest $request, $id)
    {
        try {

            $input = $request->all();
            $availabilities = [];

            $this->employee->update($id, $input);
            $employee = $this->employee->find($id);

            for ($i = 0; $i < count($input['available_day']); $i++) {

                if ($input['available_day'][$i] != '') {

                    $availabilities[$i] = new Availability([
                        'day' => $input['available_day'][$i],
                        'time' => $input['available_time'][$i]
                    ]);

                    $employee->availabilities()->saveMany($availabilities);
                }

            }


            flash('Employee Updated Successfully')->success();

            return back();

        } catch (\Throwable $t) {
            flash($t->getMessage())->error();
            // Flash::error($t->getMessage());

        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {
            if ($request->has('toDelete')) {
                $this->employee->delete($ids['toDelete']);
                // Flash::success("Employee deleted Successfully");
                flash('Employee deleted Successfully')->success();
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('employee.index'));
    }

    public function delete($id)
    {

        try {
            if ($id) {
                $this->employee->delete($id);
                Flash::success("Employee deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('employee.index'));
    }

    public function status(Request $request)
    {
        try {
            if ($request->ajax()) {
                $stat = null;
                $id = $request->input('id');
                $status = $this->employee->changeStatus($id);
                if ($status == 0) {
                    $stat = '<i class="fa fa-toggle-off fa-2x fa-lg text-danger"></i>';
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
