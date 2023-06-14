<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topics extends Model
{
    
    use HasFactory;

    protected $table = 'topics';
    public $timestamps = false;
    protected $fillable = [
        'topicid',
        'subjectid',
        'topicname',
        'accountid',
        'attendantid'
    ];
    
    public function subjects()
    {
        return $this->belongsTo(Subjects::class, 'subjectid');
    }
    
}
