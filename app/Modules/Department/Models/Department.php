<?php

namespace App\Modules\Department\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected  $fillable = [
        'sort_order',
        'title',
        'file_name',
        'intro_text',
        'file_name',
        'detail',
        'status',
    ];

    protected $hidden = [
        'status',
        'updated_at',
        'sort_order',
    ];


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
}
