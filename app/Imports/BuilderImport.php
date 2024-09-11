<?php

namespace App\Imports;

use App\Models\Builder;
use Maatwebsite\Excel\Concerns\ToModel;

class BuilderImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Builder([

            'active_id'=>$row[0],
            'name'=>$row[1],
            'active'=>$row[2],
            'date'=>$row[3],
            'infrastructure'=>$row[4],
            'jobs_id'=>$row[5],
            'category'=>$row[6],
        ]);
    }
}
