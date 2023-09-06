<?php

namespace App\Http\Controllers;

use App\Exports\ReportExport;
use App\Exports\ReportExportAll;
use App\Models\Jurnal;
use App\Models\Seminar;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubmissionExport;

class reportController extends Controller
{
    public function index() {

        $seminar = Seminar::all();
        $jurnal = Jurnal::paginate(10);
        return view('report.report', [

            'jurnal' => $jurnal,
            'seminar'=> $seminar
        ]);
        
    }
    public function search(Request $request)  {
        
        $seminar = Seminar::all();
        $jurnal = Jurnal::where('kode_seminar',$request->jenis)->get();
        $seminarSelected = Seminar::where('kode_seminar',$request->jenis)->get('kode_seminar')->first();
        $sessionSeminar = $seminarSelected->kode_seminar;
        session(['data' => $sessionSeminar]);
        return view('report.reportSearch', [
            'jurnal' => $jurnal,
            'seminar'=> $seminar,
            'seminarSel'=>$seminarSelected
        ]);
    }
    public function cetak()  {
        $kode_seminar = session('data');
        return Excel::download(new ReportExport($kode_seminar), 'Berdasar Seminar.xlsx');
    }
    public function cetaksemua()  {
        return Excel::download(new ReportExportAll, 'Semua Jurnal.xlsx');
    }
}
