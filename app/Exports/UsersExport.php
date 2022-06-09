<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithStartRow; 
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements WithDrawings,FromView,WithStartRow,WithStyles
{

    /**
    * @return \Illuminate\Support\Collection
    */
     public function drawings()
    {
        $drawing = new Drawing();
        $image=User::find(7);
        $img=$image->image;
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path($img));
        $drawing->setHeight(165);
        $drawing->setWidth(390);
        $drawing->setCoordinates('A1');

        return $drawing;
    }
    public function startRow(): int
		{
		    return 'A5';
		}


     public function view(): View
    {
        return view('backend.role.order_export', [
            'data' => User::all()
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            6   =>[

    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => '007bff',
                         ]           
                    ],],
    7   =>[

    'font' => [
        'bold' => true,
    ],
    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => 'dff0d8',
                         ]           
                    ],
    
    ],

           






            // Styling a specific cell by coordinate.
            /*'B2' => ['font' => ['italic' => true]],

            
            'C'  => ['font' => ['size' => 16]],*/
        ];
			       
    }
   
   
}
