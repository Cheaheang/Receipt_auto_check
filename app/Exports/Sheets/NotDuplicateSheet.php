<?php

namespace App\Exports\Sheets;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class NotDuplicateSheet implements FromArray
{
    protected array $data;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(array $data){
        $this->data = $data;
    }
    public function array(): array
    {
        return $this->data;
    }
}
