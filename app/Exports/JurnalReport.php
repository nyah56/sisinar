<?php

namespace App\Exports;

use App\models\Jurnal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;

class JurnalReport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromView, WithColumnWidths, WithCustomValueBinder
{
    private $kode_seminar;
    use Exportable;
    public function __construct(String $kode_seminar)
    {
        $this->kode_seminar = $kode_seminar;
    }

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

        $jurnal = Jurnal::where('kode_seminar', $this->kode_seminar)->get();

        return view('report.jurnal-report', ['jurnal' => $jurnal]);

    }

}
