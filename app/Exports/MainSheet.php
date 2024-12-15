<?php

namespace App\Exports;

use App\Exports\Sheets\NotMatchSheet;
use App\Models\Cfo;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Sheet;

class MainSheet implements withMultipleSheets
{
    protected array $filterBill= [];
    protected array $matching= [];
    private array $companyHeader=[];
    private array $notMatch=[];

    public function __construct(array $filterBill, array $match, array $notMatch, array $companyHeader)
    {
        $this->filterBill= $filterBill;
        $this->matching= $match;
        $this->notMatch= $notMatch;
        $this->companyHeader = $companyHeader;
    }
    public function sheets(): array
    {
        return [
           'Check'=> new Sheets\BillSheet($this->filterBill),
           'Pay'=>  new Sheets\MatchSheet($this->matching, $this->companyHeader),
            'Other'=> new NotMatchSheet($this->notMatch, $this->companyHeader),
        ];
    }
}
