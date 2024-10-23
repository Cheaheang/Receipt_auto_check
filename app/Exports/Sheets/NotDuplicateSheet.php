<?php

namespace App\Exports\Sheets;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithTitle;

class NotDuplicateSheet implements FromArray, WithHeadings, WithTitle
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
    public function headings(): array
    {
        return ['Active ID','Name', 'Active' , 'Date' , 'Infrastructure', 'Jobs', 'Category', 'installation_order'];
    }
    public function title(): string{
        return 'Not Match';
    }
}
