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
            'kode_seminar' => 'required|unique:tb_reviewer',
            'judul' => 'required',
            'nama' => 'required',
            'email' => 'required|email:max:255',
            'aviliasi' => 'required',
            'wa' => 'required|numeric',
            'kode_seminar' => 'required',
            'status' => 'required',
            'pembayaran' => 'required',
        ]);
        // dd($request->all());
        Jurnal::create([
            'submission' => $request->submission,
            'judul' => $request->judul,
            'nama' => $request->nama,
            'email' => $request->email,
            'aviliasi' => $request->aviliasi,
            'no_wa' => $request->wa,
            'kode_seminar' => $request->kode_seminar,
            'status' => $request->status,
            'pembayaran' => $request->pembayaran,
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
