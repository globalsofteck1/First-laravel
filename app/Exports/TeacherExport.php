<?php

namespace App\Exports;

use App\Models\teachers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeacherExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return teachers::all();
        return teachers::select(
            'name', 'username','nin', 'address', 'password', 'email',
        )->get();
    }

    
    public function headings(): array
    {
        return [
        'name',
        'username',
        'nin',
        'address',
        'password',
        'email',
        ];
    }
}
