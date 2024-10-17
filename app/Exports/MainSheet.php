<?php

namespace App\Exports;

use App\Models\Cfo;
use App\Models\CfoExport;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Sheet;

class MainSheet implements withMultipleSheets
{
    protected array $duplicate= [];
    protected array $notDuplicate= [];
    public function __construct(array $duplicate, array $notDuplicate)
    {
        $this->duplicate= $duplicate;
        $this->notDuplicate= $notDuplicate;
    }
    public function sheets(): array
    {
        return [
           'Not_Duplicate'=> new Sheets\NotDuplicateSheet($this->notDuplicate),
           'Duplicate'=>  new Sheets\DuplicateSheet($this->duplicate),
        ];
    }
}
