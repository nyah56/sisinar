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
        $jurnal = Jurnal::paginate(10);
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
        // dd($request->all());
        $jurnal = Jurnal::find($id);
        $this->validate($request, [
            'pembayaran' => 'required',
            'kehadiran' => 'required',

        ]);
        $jurnal->update([
            'pembayaran' => $request->pembayaran,
            'kehadiran' => $request->kehadiran,
            'catatan' => $request->catatan,
        ]);
        return redirect('/kesekretariatan');

    }
}
