<?php

namespace App\Exports;

use App\Models\Sale;
use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\FromCollection;// para trabajar concolecciones y obtener la data
use Maatwebsite\Excel\Concerns\WithHeadings;//para definir los titulos del encabezado
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;//para intercatual con el libro
use Maatwebsite\Excel\Concerns\WithCustomStartCell;//para definir la celda donde inicia el reporte
use Maatwebsite\Excel\Concerns\WithTitle;//para colocar el nombre a las hojas del libro
use Maatwebsite\Excel\Concerns\WithStyles;//para dar formato a las celdas

class SalesExport implements FromCollection,WithHeadings,
WithCustomStartCell,WithTitle,WithStyles
{
    protected $userId, $dateFrom, $dateTo, $reportType;

    function __construct($userId, $reportType, $f1, $f2){
        $this->userId = $userId;
        $this->reportType = $reportType;
        $this->dateFrom = $f1;
        $this->dateTo = $f2;
    }

    public function collection()
    {
        $data = [];
        if($this->reportType == 1)
        {
            $from = Carbon::parse($this->dateFrom)->format('Y-m-d') . ' 00:00:00 ';
            $to = Carbon::parse($this->dateTo)->format('Y-m-d') . ' 23:59:59 ';
        }else{
            $from = Carbon::parse($this->Carbon::now)->format('Y-m-d') . ' 00:00:00 ';
            $to = Carbon::parse($this->Carbon::now)->format('Y-m-d') . ' 23:59:59 ';
        }

        if($this->userId == 0)
        {
            $data = Sale::join('users as u','u.id','sales.user_id')
            ->select('sales.id','sales.total','sales.items','sales.status','u.name as user','sales.created_at')
            ->whereBetween('sales.created_at',[$from, $to])
            ->get();
        } else {
            $data = Sale::join('users as u','u.id','sales.user_id')
            ->select('sales.id','sales.total','sales.items','sales.status','u.name as user','sales.created_at')
            ->whereBetween('sales.created_at',[$from, $to])
            ->where('user_id', $this->userId)
            ->get();
        }
        return $data;
    }

    // cabecera del reporte
    public function headings() : array
    {
        return ["FOLIO","IMPORTE","ITEMS","ESTATUS","USUARIO","FECHA"];
    }

    // definiendo en que celda empieza la impresion del reporte
    public function startCell() : string
    {
        return 'A2';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            2 => ['font' => ['bold' => true]],
        ];
    }

    public function title() : string
    {
        return 'Reporte de Ventas';
    }
}
