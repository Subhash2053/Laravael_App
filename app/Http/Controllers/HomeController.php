<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductResource;
use App\Modules\Department\Models\Department;
use App\Modules\Employee\Models\Employee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Department[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {

       return view('home');

    }

}
