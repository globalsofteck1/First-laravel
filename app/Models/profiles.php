<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    public $timestamps = true;
    protected $fillable = [
        'fullname',
        'address',
        'careof',
        'contact',
        'email',
        'userid',
        'class',
        'payments',
        'initials',
        'photo',
        'sign',
        'authstatus',
        'accountid',
        'attendantid'
    ];
}
