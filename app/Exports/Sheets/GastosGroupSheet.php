<?php

namespace App\Exports\Sheets;

use App\Models\Gastos;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCharts;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class GastosGroupSheet implements FromQuery,ShouldAutoSize,WithMapping,WithHeadings,WithColumnFormatting,WithTitle,WithEvents
{
    use RegistersEventListeners;
    public $rango;
    public function __construct(Array $rango) {
        $this->rango = $rango;
    }
    public  function columnFormats(): array
    {
        return ['B'=>NumberFormat::FORMAT_ACCOUNTING_USD];
    }
    public function headings(): array
    {
        return ['Categoría','Monto invertido'];
    }
    public function map($gasto): array
    {
        return[
            $gasto->categoria->name,
            number_format($gasto->total,2),
        ];
    }
    public function query()
    {
        return Gastos::selectRaw('categori_id,SUM(cantidad) AS total')->whereBetween('date',$this->rango)->groupBy('categori_id');
    }
    public function afterSheet(AfterSheet $event){
        $headers='A1:B1';
        //estilos al head de la tabla
        $general='A1:B'.$event->getSheet()->getDelegate()->getHighestRow();
        $event->getDelegate()->getStyle($headers)->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'ffffff'],
            ],'fill' =>[
                'fillType'=> Fill::FILL_SOLID,
                'color'=> ['argb'=>'800080']
            ]
        ]);
        //aplicamos estilos de manera general a toda la tabla
        $event->getDelegate()->getStyle($general)->applyFromArray([
            'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER
            ],'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'ff000000'],
                ]
            ]
        ]);
       
    }
    public function title(): string
    {
        return 'Categorias';
    }
}
