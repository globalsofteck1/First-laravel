<?php

namespace App\Imports;

use App\Models\marksheets;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MarksImport implements ToModel, WithStartRow
{

    public function startRow(): int
    {
         // This function startwithRow will help save excel data to database without headings        
            return 2;
     }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
public function model(array $row)
{
    if (isset($row[0]) && $row[0] != 'studname') {
        return new marksheets([
            'studname' => $row[0],
            'studentid' => $row[1],
            'chap1' => $row[2],
            'chap2' => $row[3],
            'chap3' => $row[4],
            'score1' => $row[5],
            'score2' => $row[6],
            'score3' => $row[7]
        ]);
    }
}
}