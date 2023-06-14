<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subjects extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    public $timestamps = false;
    protected $fillable = [
        'subjectname',
        'accountid',
        'attendantid'
    ];
    
    public function topics()
    {
        return $this->hasMany(Topics::class);
    }
}
