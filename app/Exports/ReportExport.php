<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\models\Jurnal;


class ReportExport implements FromView
{
    private $kode_seminar;
    use Exportable;
   public function __construct(String $kode_seminar)
   {
    $this->kode_seminar = $kode_seminar;
   }
    public function view():View {
        $jurnal = Jurnal::where('kode_seminar',$this->kode_seminar)->get();
    return view('report.reportExport',['jurnal'=>$jurnal]);
        
    }
}
