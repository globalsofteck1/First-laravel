<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marksheets extends Model
{
    use HasFactory;

    protected $table = 'marksheets';
    public $timestamps = false;
    protected $fillable = [
        'subjectid',
        'userid',
        'chapterid',
        'marks',
        'score',
        'desc',
        'comp',
        'skills',
        'remarks',
        'initials',
        'accountid',
        'attendantid'
    ];
}
