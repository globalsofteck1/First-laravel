<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolespages extends Model
{
    use HasFactory;

    protected $table = 'rolespages';
    public $timestamps = true;
    protected $fillable = [
        'pagename',
        'attendantid',
        'accountid'
    ];
}
