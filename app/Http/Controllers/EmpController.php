<?php

namespace App\Http\Controllers;

use App\Modules\Employee\Models\Employee;
use Illuminate\Http\Request;

class EmpController extends Controller
{
    public function index($emlployee_id ){
        $employee=Employee::where('department_id',$emlployee_id)->get();
        // dd($department);
        //return $department;
        return $employee;

    }
}
