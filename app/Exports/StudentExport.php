<?php

namespace App\Exports;

use App\Models\students;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return students::all();
        return students::select(
            'name', 'studID', 'username','LIN', 'subject', 'class', 'photo',
        )->get();
    }

    
    public function headings(): array
    {
        return [
        'name',
        'studID',
        'username',
        'LIN',
        'subject',
        'class',
        'photo',
        ];
    }
}
