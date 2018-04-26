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



}
