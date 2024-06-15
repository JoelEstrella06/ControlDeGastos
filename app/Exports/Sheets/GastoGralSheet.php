<?php

namespace App\Exports\Sheets;

use App\Models\Gastos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class GastoGralSheet implements FromQuery,ShouldAutoSize,WithMapping,WithHeadings,WithColumnFormatting,WithEvents,WithTitle
{
    use RegistersEventListeners;
    public $rango;
    public function __construct(Array $rango) {
        $this->rango = $rango;
    }
    public function headings(): array
    {
        return['Categoría','Monto invertido','Fecha de gasto'];
    }
    public function columnFormats(): array
    {
        return [
            'B'=>NumberFormat::FORMAT_CURRENCY_USD,
            'C'=>NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
    public function map($gasto): array
    {   
        return [
            $gasto->categoria->name,
            number_format($gasto->cantidad,2),
            $gasto->date
        ];
    }
    public function query()
    {
        return Gastos::whereBetween('date',$this->rango);
    }
    //ejecutamos en un lifecycle para aplicar estilos al sheet
    public static function afterSheet(AfterSheet $event)
    {
        $headers='A1:C1';
        $general='A1:C'.$event->getSheet()->getDelegate()->getHighestRow();
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
        return 'Listado general';
    }
}
