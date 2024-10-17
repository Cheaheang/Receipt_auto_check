<?php

namespace App\Imports;

use App\Models\Cfo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class CfoImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

     public function model(array $row)
    {
        return new Cfo([
            'Work Order'=>$row['Work Order'],
            'PORT'=>$row['PORT'],
            'POS'=>$row['POS'],
            'Team Install'=>$row['Team Install'],
            'Create Time'=>$row['Create Time'],

        ]);
    }
//$sheet->mergeCells('A1:E1');

//    public function headingRow(): int
//    {
////        $sheet->
//        return 3;
//    }
}
