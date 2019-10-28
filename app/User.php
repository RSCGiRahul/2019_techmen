<?php

namespace App;

use App\Models\Region;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Role;
use Auth;
class User extends Authenticatable  implements MustVerifyEmail
{
    use SoftDeletes;
    use Notifiable;
    const Admin_Level = 1;
    const Manager_Level = 2;
    const Human_Resource = 3;
    const Executive = 4;
    const Technician = 5;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phone' ,'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function firstRole()
    {
        return $this->belongsToMany(Role::Class,'user_role')->first();
    }



    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }
    /**
     * Check multiple roles
     * @param array $roles
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn(‘name’, $roles)->first();
    }
    /**
     * Check one role
     * @param string $role
     */
    public function hasRole($role)
    {
//        dd(Auth::user()->roles()->first());
//        dd($this->roles());
        if(in_array(Auth::user()->roles()->first()->id,$role)){
            return true;
        }
        return false;

    }

    public function roles()
    {
       return $this->belongsToMany(Role::class, 'user_role');

    }

    public function region()
    {
        return $this->belongsToMany(Region::class, 'user_region');
    }
}
