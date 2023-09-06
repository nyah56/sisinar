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
        //SENIATI
        $subTI = Jurnal::join('tb_jenisseminar', 'tb_jurnal.kode_seminar', '=', 'tb_jenisseminar.kode_seminar')
            ->where('tb_jenisseminar.jenis_seminar', 'SENIATI')->where('tb_jurnal.status', 1)->count();
        $revTI = Jurnal::join('tb_jenisseminar', 'tb_jurnal.kode_seminar', '=', 'tb_jenisseminar.kode_seminar')
            ->where('tb_jenisseminar.jenis_seminar', 'SENIATI')->where('tb_jurnal.status', 2)->count();
        $pubTI = Jurnal::join('tb_jenisseminar', 'tb_jurnal.kode_seminar', '=', 'tb_jenisseminar.kode_seminar')
            ->where('tb_jenisseminar.jenis_seminar', 'SENIATI')->where('tb_jurnal.status', 7)->count();
        //SEMSINA
        $subNA = Jurnal::join('tb_jenisseminar', 'tb_jurnal.kode_seminar', '=', 'tb_jenisseminar.kode_seminar')
            ->where('tb_jenisseminar.jenis_seminar', 'SEMSINA')->where('tb_jurnal.status', 1)->count();
        $revNA = Jurnal::join('tb_jenisseminar', 'tb_jurnal.kode_seminar', '=', 'tb_jenisseminar.kode_seminar')
            ->where('tb_jenisseminar.jenis_seminar', 'SEMSINA')->where('tb_jurnal.status', 2)->count();
        $pubNA = Jurnal::join('tb_jenisseminar', 'tb_jurnal.kode_seminar', '=', 'tb_jenisseminar.kode_seminar')
            ->where('tb_jenisseminar.jenis_seminar', 'SEMSINA')->where('tb_jurnal.status', 7)->count();
        // dd($subTI);

        // dd($semsina);
        return view('dashboard', compact(
            'sumJurnal',
            'semsina',
            'seniati',
            'reviewer',
            'koor',
            'kesek',
            'subTI', 'revTI', 'pubTI', 'subNA', 'revNA', 'pubNA',
        ));
    }
}
