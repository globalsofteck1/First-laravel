<?php

namespace App\Exports;

use App\Models\marksheets;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class MarksExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /** 
     *             WithHeadings helps to download a spreadsheet with headings
     *             ShouldAutoSize adjusts the column size automatically 
     *             AfterSheet ( WithEvents )  formatting the fonts and sizes
     * **/
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event)
            {
                $cellRange = 'A1:W1'; // All headers are styled at ounce
                /// Take whatever cell range we pass and changess the styles
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            }
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return marksheets::all();
        return marksheets::select(
            'studname',
            'userid', 
            'chapterid', 
            'marks',
            'score', 
            'desc',
            'comp',
            'skills',
            'remarks'
        )->get();
    }

    public function headings(): array
    {
        return [
        ['Student Name',
        'Student Id',
        'Chapter Id',
        'Marks dgbbfdgbffhnghnghghngh',
        'Score',
        'desc',
        'comp',
        'Skills',
        'Remarks'],
        
        //['Second row', 'Second row'], //  this adds the second row headings
        ];
    }
}
