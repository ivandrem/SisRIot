<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;

class User extends Authenticatable
{
    use Notifiable;

    use HasRolesAndPermissions;
    //use SoftDeletes;

    protected $fillable = ['dni', 'name', 'email', 'password', 'phone'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    function hasEditableRole(): bool
    {
        $roles = $this->roles;

        if($roles==null || count($roles)==0){return true;}

    	foreach($roles as $role)
    	{
    		if($role->editable){return true;}
    	}

    	return false;
    }

    function hasPhone(): bool
    {
    	if($this->phone==null || $this->phone==''){return false;}
    	else{return true;}
    }
}
