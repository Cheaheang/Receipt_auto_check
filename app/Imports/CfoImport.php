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
//            'subscriber_id'=>$row['subscriberNo'],
//            'port'=>$row['PORT'],
//            'pos'=>$row['POS'],
//            'team_install'=>$row['team\ install'],
//            'create_time'=>$row['create\ time'],
            'work_order'=>$row['Work Order'],
            'port'=>$row['PORT'],
            'pos'=>$row['POS'],
            'team_install'=>$row['Team Install'],
            'create_time'=>$row['Create Time'],
        ]);
    }
//$sheet->mergeCells('A1:E1');

//    public function headingRow(): int
//    {
////        $sheet->
//        return 3;
//    }
}
