<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Seminar;
use Illuminate\Http\Request;

class KesekretariatanController extends Controller
{
    //
    public function index()
    {
        //
        $jurnal = Jurnal::all();
        return view('kesekretariatan.kesekretariatan', [

            'jurnal' => $jurnal,
        ]);
    }
    public function edit(string $id)
    {
        $jurnal = Jurnal::find($id);
        $seminar = Seminar::all();
        return view('kesekretariatan.kesekretariatan-edit', ['jurnal' => $jurnal, 'seminar' => $seminar]);
    }
    public function update(Request $request, string $id)
    {

        $jurnal = Jurnal::find($id);
        $this->validate($request, [
            'pembayaran' => 'required',
            'kehadiran' => 'required',
        ]);
        $jurnal->update([
            'pembayaran' => $request->pembayaran,
            'kehadiran' => $request->kehadiran,
        ]);
        return redirect('/kesekretariatan');

    }

    public function indexAdmin()
    {
        //
        $jurnal = Jurnal::all();
        return view('kesekretariatan.kesekretariatanAdmin', [

            'jurnal' => $jurnal,
        ]);
    }

    public function editAdmin(string $id)
    {
        $jurnal = Jurnal::find($id);
        $seminar = Seminar::all();
        return view('kesekretariatan.kesekretariatan-editAdmin', ['jurnal' => $jurnal, 'seminar' => $seminar]);
    }
    public function updateAdmin(Request $request, string $id)
    {

        $jurnal = Jurnal::find($id);
        $this->validate($request, [
            'pembayaran' => 'required',
            'kehadiran' => 'required',
        ]);
        $jurnal->update([
            'pembayaran' => $request->pembayaran,
            'kehadiran' => $request->kehadiran,
        ]);
        return redirect('/kesekretariatan/admin');

    }
}
