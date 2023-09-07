<?php

namespace App\Exports;

use App\models\Jurnal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;

class JurnalAllReport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromView, WithColumnWidths, WithCustomValueBinder
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;
    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 40,
            'C' => 25,
            'D' => 25,
            'E' => 20,
            'F' => 15,
            'G' => 25,
            'H' => 15,
        ];
    }
    public function view(): View
    {
        return view('report.jurnal-report', [
            'jurnal' => Jurnal::all(),
        ]);
    }
}
