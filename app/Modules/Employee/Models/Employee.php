<?php

namespace App\Modules\Employee\Models;

use App\Modules\Department\Models\Department;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'department_id',
        'name',
        'profile_image',
        'status',
        'detail',
        'sort_order',
        'designation',
        'specialization',
        'degree'

    ];
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function departments()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
    public function availabilities(){

        return $this->hasMany(Availability::class);
    }

}
