<?php

namespace App\Exports\Sheets;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class DuplicateSheet implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected array $data =[];
    public function __construct(array $data){
        $this->data = $data;
    }
    public function array(): array
    {
        return $this->data;
    }
}
