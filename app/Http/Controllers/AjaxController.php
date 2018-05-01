<?php

namespace App\Http\Controllers;

use App\Modules\Department\Models\Department;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    function loadData(Request $request){

        $department=Department::all();
        dd( json_encode( $department));


        return \Response::JSON(array(
                'data'       =>  json_encode( $department),

            )
        );
    }
}
