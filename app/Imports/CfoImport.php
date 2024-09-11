<?php

namespace App\Imports;

use App\Models\CFO;
use Maatwebsite\Excel\Concerns\ToModel;

class CfoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CFO([
            'active_id'=>$row[3],
            'port'=>$row[11],
            'pos'=>$row[12],
            'team_install'=>$row[13],
            'create_time'=>$row[15],
        ]);
    }
}
