<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $seminar = Seminar::all();
        return view('jenis_seminar.seminar', [

            'seminar' => $seminar,
        ]);

    }
    public function jsonSeminar(string $id)
    {
        $seminar = Seminar::find($id);
        return response()->json($seminar);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('jenis_seminar.seminar-entry');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$kode_seminar , jenis_seminar request
        // dd($request->all());
        $this->validate($request, [
            'kode_seminar' => 'required|unique:tb_jenisseminar',
            'jenis_seminar' => 'required',
        ]);

        Seminar::create([
            'kode_seminar' => $request->kode_seminar,
            'jenis_seminar' => $request->jenis_seminar,
        ]);
        return redirect('/seminar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $seminar = Seminar::find($id);
        return view('jenis_seminar.seminar-edit', ['seminar' => $seminar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $seminar = Seminar::find($id);
        $this->validate($request, [

            'jenis_seminar' => 'required',
        ]);

        $seminar->update([

            'jenis_seminar' => $request->jenis_seminar,
        ]);
        return redirect('/seminar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $seminar = Seminar::find($id);
        $seminar->delete();
        return redirect('/seminar');

    }
}
