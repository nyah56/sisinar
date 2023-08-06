<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Reviewer;
use App\Models\UserModel;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $sumJurnal = Jurnal::count();

        $semsina = Jurnal::join('tb_jenisseminar', 'tb_jurnal.kode_seminar', '=', 'tb_jenisseminar.kode_seminar')
            ->where('tb_jenisseminar.jenis_seminar', 'SEMSINA')->count();

        $seniati = Jurnal::join('tb_jenisseminar', 'tb_jurnal.kode_seminar', '=', 'tb_jenisseminar.kode_seminar')
            ->where('tb_jenisseminar.jenis_seminar', 'SENIATI')->count();
        $reviewer = Reviewer::count();
        $koor = UserModel::where('role', 'Koordinator')->count();
        $kesek = UserModel::where('role', 'Kesekretariat')->count();
        // dd($semsina);
        return view('dashboard', compact(
            'sumJurnal',
            'semsina',
            'seniati',
            'reviewer',
            'koor',
            'kesek'
        ));
    }
}
