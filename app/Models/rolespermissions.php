<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolespermissions extends Model
{
    use HasFactory;

    protected $table = 'rolespermissions';
    public $timestamps = true;
    protected $fillable = [
        'roleid',
        'pageid',
        'accesstatus',
        'createstatus',
        'deletestatus',
        'editstatus',
        'viewstatus',
        'attendantid',
        'accountid'
    ];
}
