<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\models\Jurnal;

class ReportExportAll implements FromView
{
    use Exportable;
    public function view(): View
    {
        return view('report.reportExport', [
            'jurnal' => Jurnal::all()
        ]);
    }
}
