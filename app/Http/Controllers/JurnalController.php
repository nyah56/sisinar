<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Seminar;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jurnal = Jurnal::all();
        return view('jurnal.jurnal', [

            'jurnal' => $jurnal,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $seminar = Seminar::all();
        return view('jurnal.jurnal-entry', compact('seminar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'submission' => 'required|unique:tb_jurnal',
            'judul' => 'required',
            'nama' => 'required',
            'email' => 'required|email:max:255',
            'prodi' => 'required',
            'pt' => 'required',
            'wa' => 'required|numeric',
            'kode_seminar' => 'required',
            'kehadiran' => 'required',
        ]);
        Jurnal::create([
            'submission' => $request->submission,
            'judul' => $request->judul,
            'nama' => $request->nama,
            'email' => $request->email,
            'prodi' => $request->prodi,
            'pt' => $request->pt,
            'no_wa' => $request->wa,
            'kode_seminar' => $request->kode_seminar,
            'status' => 1,
            'kehadiran' => $request->kehadiran,
            'pembayaran' => 1,
            'catatan' => $request->catatan,
        ]);

        return redirect('/jurnal');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jurnal = Jurnal::find($id);

        // Return the data in JSON format
        return response()->json($jurnal);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jurnal = Jurnal::find($id);
        $seminar = Seminar::all();
        return view('jurnal.jurnal-edit',['jurnal' => $jurnal,'seminar'=>$seminar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jurnal = Jurnal::find($id);
        $this->validate($request, [
            'judul' => 'required',
            'nama' => 'required',
            'email' => 'required|email:max:255',
            'prodi' => 'required',
            'pt' => 'required',
            'wa' => 'required|numeric',
            'kode_seminar' => 'required',
            'kehadiran' => 'required',
        ]);

        $jurnal->update(['
        submission' => $request->submission,
        'judul' => $request->judul ,
        'nama' => $request->nama,
        'email' => $request-> email,
        'prodi' => $request-> prodi,
        'pt' => $request-> pt,
        'no_wa' => $request-> wa,
        'kode_seminar' => $request-> kode_seminar,
        'kehadiran' => $request-> kehadiran,
        'catatan' => $request->catatan
    ]);
    return redirect('/jurnal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $jurnal = Jurnal::find($id);
        $jurnal->delete();
        return redirect('jurnal');
    }
}
