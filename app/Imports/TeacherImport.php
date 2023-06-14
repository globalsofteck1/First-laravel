<?php

namespace App\Imports;

use App\Models\teachers;
use Maatwebsite\Excel\Concerns\ToModel;

class TeacherImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
    
        if (isset($row[0]) && $row[0] != 'name') {
        return new teachers([
            'name' => $row[0],
            'username' => $row[1],
            'nin' => $row[2],
            'address' => $row[3],
            'password' => $row[4],
            'email' => $row[5]
        ]);
    }
    }
}
