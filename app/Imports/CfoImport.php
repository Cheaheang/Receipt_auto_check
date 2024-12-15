<?php

namespace App\Imports;

use App\Models\Cfocn;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class CfoImport implements WithHeadingRow, ToModel
{
//public function startRow(): int
//{
//    return 2;
//
//}
//    /**
//    * @param array $row
//    *
//    * @return \Illuminate\Database\Eloquent\Model|null
//    */
//
     public function model(array $row)
    {
        return new Cfocn([
            'work_order'=>$row['Work Order'],
            'port'=>$row['PORT'],
            'pos'=>$row['POS'],
            'team_install'=>$row['Team Install'],
            'create_time'=>$row['Create Time'],

        ]);
    }
//    public function map($row): array{
//        return [
//            'Work Order'=>$row['Work Order'],
//            'PORT'=>$row['PORT'],
//            'pos'=>$row['POS'],
//            'team_install'=>$row['Team Install'],
//            'create_time'=>$row['Create Time'],
//        ];
//    }

}
