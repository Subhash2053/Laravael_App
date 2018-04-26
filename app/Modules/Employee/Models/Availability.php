<?php

namespace App\Modules\Employee\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{

    protected $fillable = [
        'employee_id',
        'day',
        'time',

    ];
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
    public function employees(){

        return $this->belongsTo(Employee::class);
    }


}
