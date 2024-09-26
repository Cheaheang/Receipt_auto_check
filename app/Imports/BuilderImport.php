<?php

namespace App\Imports;

use App\Models\Builder;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class BuilderImport implements ToModel,withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Builder([

            'active_id'=>$row['id'],
            'name'=>$row['name'],
            'active'=>$row['active'],
            'date'=>$row['date'],
            'infrastructure'=>$row['infrastructure'],
            'jobs_id'=>$row['jobs'],
            'category'=>$row['category'],
            'installation_order'=>$row['installation_order'],
        ]);
    }
}
