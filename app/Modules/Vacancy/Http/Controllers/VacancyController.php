<?php

namespace App\Modules\Vacancy\Http\Controllers;

use App\Modules\Department\Models\Department;
use App\Modules\Department\Repositories\DepartmentInterface;

use App\Modules\Vacancy\Http\Requests\VacancyFormRequest;
use App\Modules\Vacancy\Models\Vacancy;
use App\Modules\Vacancy\Repositories\VacancyInterface;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class VacancyController extends Controller
{
    protected $vacancy;
    protected $department;
    protected $availability;

    public function __construct(VacancyInterface $vacancy, DepartmentInterface $department)
    {
        $this->middleware('auth');
        $this->vacancy = $vacancy;
        $this->department = $department;

    }

    public function index()
    {
        //dd('hello');
        $vacancies= Vacancy::paginate(8);
       // dd($vacancy);


       return view('vacancy::index',compact('vacancies'));
    }
    public function create()
    {
        //$departments=Department::all();
        $data['departments'] = $this->department->findList();
        //dd($departments->title);



        return view('vacancy::create',$data);
    }

    public function store(VacancyFormRequest $request)
    {
        $input = $request->all();
        //dd($input);

        try {

           $this->vacancy->save($input);




            flash('Vacancy Created Successfully')->success();

        } catch (\Throwable $e) {

            flash($e->getMessage())->error();
            // Flash::error($e->getMessage());
        }

        return redirect(route('vacancy.index'));
    }


}
