<?php

namespace App\Http\Controllers;

use App\Exports\JurnalAllReport;
use App\Exports\JurnalReport;
use App\Models\Jurnal;
use App\Models\Seminar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    //
    public function index()
    {
        session()->forget('search', 'namaSeminar');
        $seminar = Seminar::all();
        $jurnal = Jurnal::paginate(10);
        return view('report.report', [

            'jurnal' => $jurnal,
            'seminar' => $seminar,
        ]);

    }
    public function search(Request $request)
    {
        session()->forget('search', 'namaSeminar');
        $seminar = Seminar::all();
        $jurnal = Jurnal::where('kode_seminar', $request->jenis)->get();
        $seminarSelected = Seminar::where('kode_seminar', $request->jenis)->get('jenis_seminar')->first();
        $sessionNamaSeminar = $seminarSelected->jenis_seminar;

        session([
            'search' => $request->jenis,
            'namaSeminar' => $sessionNamaSeminar,

        ]);
        return view('report.report-search', [
            'jurnal' => $jurnal,
            'seminar' => $seminar,
            'seminarSel' => $seminarSelected,
        ]);
    }
    public function cetak()
    {
        $tanggal = Carbon::now()->format('dmy');
        $jam = Carbon::now()->setTimezone('Asia/Bangkok')->format('His');
        $kode_seminar = session('search');
        $nama_seminar = session('namaSeminar');

        return Excel::download(new JurnalReport($kode_seminar), 'Report Seminar ' . $nama_seminar . '-' . $tanggal . '-' . $jam . '.xlsx');
    }
    public function cetaksemua()
    {
        $tanggal = Carbon::now()->format('dmy');
        $jam = Carbon::now()->setTimezone('Asia/Bangkok')->format('His');
        return Excel::download(new JurnalAllReport, 'Semua Jurnal-' . $tanggal . '-' . $jam . '.xlsx');
    }
}
