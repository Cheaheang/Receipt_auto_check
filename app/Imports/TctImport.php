<?php

namespace App\Imports;

use App\Models\Tct;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use function Laravel\Prompts\select;

HeadingRowFormatter::default('none');
class TctImport implements WithHeadingRow, WithMapping, ToModel
{
//    /**
//    * @param array $row
//    *
//     * @return \Illuminate\Database\Eloquent\Model|null
//     */
    public function model(array $row): Tct
    {
        return new Tct([
            'tct_cid'=>$row['TCT CID'],
            'tct_sid'=>$row['TCT SID'],
            'new_circuit_id'=>$row['New circuit ID'],
            'total_nrc'=>$row['Total NRC'],
        ]);
    }
    public function map($row): array{
        return [
            'TCT CID'=>$row['TCT CID'],
            'TCT SID'=>$row['TCT SID'],
            'New circuit ID'=>$row['New circuit ID'],
            'Status'=>$row['Status'],
            'Total NRC'=>$row['Total NRC'],
        ];
    }
}
