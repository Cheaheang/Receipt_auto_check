<?php

namespace App\Exports\Sheets;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class DuplicateSheet implements FromArray, WithHeadings, WithTitle
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
    public function headings(): array
    {
     return ['Active ID','Name', 'Active' , 'Date' , 'Infrastructure', 'Jobs', 'Category', 'installation_order'];
    }
    public function title(): string{
        return 'Duplicate Sheet';
    }
}
