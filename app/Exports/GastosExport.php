<?php

namespace App\Exports;

use App\Exports\Sheets\GastoGralSheet;
use App\Exports\Sheets\GastosGroupSheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GastosExport implements WithMultipleSheets
{
    /**
    * @param $rango Un array con la fecha de inicio y de término
    */
    public $rango;
    public function __construct(Array $rango) {
        $this->rango = $rango;
    }
    public function sheets(): array
    {
        $arr=[];
        array_push($arr,new GastoGralSheet($this->rango));
        array_push($arr,new GastosGroupSheet($this->rango));
        return $arr;
    }
}
