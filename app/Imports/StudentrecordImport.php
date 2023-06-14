<?php

namespace App\Imports;

use App\Models\students;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;

class StudentrecordImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
    
        if (isset($row[0]) && $row[0] != 'name') {
        return new students([
            'name' => $row[0],
            'studID' => $row[1],
            'username' => $row[2],
            'LIN' => $row[3],
            'subject' => $row[4],
            'class' => $row[5],
            'photo' => $row[6]
        ]);
    }
    }
}
