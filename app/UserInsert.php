<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class UserInsert extends Authenticatable implements MustVerifyEmail
{
    protected $table = 'users';
    public $timestamp = true;
    protected $fillable = [
		'username', 'password','email'
	];
}
