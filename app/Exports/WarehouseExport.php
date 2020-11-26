<?php

namespace App\Exports;

use App\Warehouse;
use Maatwebsite\Excel\Concerns\FromArray;

class WarehouseExport implements FromArray  
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function collection()
    {
        return Warehouse::orderBy('id','asc')->get();
    }
    public function array(): array  
    {
        return $this->data;
    }
}
