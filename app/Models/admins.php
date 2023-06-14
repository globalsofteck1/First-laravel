<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admins extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';
    public $timestamps = true;
    protected $fillable = [
        'username',
        'usertype',
        'regdate',
        'authstatus',
        'attendantid',
        'accountid',
        'password'
    ];
}