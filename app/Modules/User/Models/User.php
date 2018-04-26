<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent',
        'name',
        'address',
        'phone',
        'mobile',
        'business_name',
        'no_of_child',
        'username',
        'email',
        'password',
        'profile_image',
        'user_type',
        'created_by_id',
        'status',
        'active',
        'last_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'user_type',
        'created_by_id',
        'deleted_at',
        'deleted_at',
        'status',
        'no_of_child',
        'parent',
        'username',

    ];


    public function setPasswordAttribute($value)
    {
        if( \Hash::needsRehash($value) ) {
            $value = \Hash::make($value);
        }
        $this->attributes['password'] = $value;
    }


}
