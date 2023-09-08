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
    private $state;
    public function index()
    {
        $state = false;
        session()->forget('search', 'namaSeminar');
        $seminar = Seminar::all();
        $jurnal = Jurnal::paginate(10);
        return view('report.report', [
            'state' => $state,
            'jurnal' => $jurnal,
            'seminar' => $seminar,
        ]);

    }
    public function search(Request $request)
    {
        // dd($request->all());

        session()->forget('search', 'namaSeminar');
        $seminar = Seminar::all();
        // $tes = Seminar::find($request->kode);
        $seminarFilter = Seminar::getJenis($request->seminar);
        $state = !is_null($seminarFilter);
        // dd($seminarFilter);
        $jurnal = Jurnal::where('kode_seminar', $seminarFilter)->get();

        // $sessionNamaSeminar = $seminarSelected->jenis_seminar;

        session([
            'search' => $seminarFilter,
            'namaSeminar' => $request->seminar,

        ]);
        return view('report.report', [
            'state' => $state,
            'jurnal' => $jurnal,
            'seminar' => $seminar,
            // 'seminarSel' => $seminarSelected,
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
