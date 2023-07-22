<?php

namespace App\Http\Controllers;

use App\Models\Reviewer;
use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    public function index()
    {
        //
        $reviewer = Reviewer::all();
        return view('reviewer.reviewer', [

            'reviewer' => $reviewer,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('reviewer.reviewer-entry');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$kode_seminar , jenis_seminar request
        // dd($request->all());
        $this->validate($request, [
            'id_reviewer' => 'required|unique:tb_reviewer',
            'nama' => 'required',
        ]);

        Reviewer::create([
            'id_reviewer' => $request->id_reviewer,
            'nama' => $request->nama,
        ]);
        return redirect('/reviewer');
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
        // $reviewer = Reviewer::where('tb_reviewer','=', $id);
        $reviewer = Reviewer::find($id);
        return view('reviewer.reviewer-edit', ['reviewer' => $reviewer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $reviewer = Reviewer::find($id);
        $this->validate($request, [

            'nama' => 'required',
        ]);

        $reviewer->update([

            'nama' => $request->nama,
        ]);
        return redirect('/reviewer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $reviewer = Reviewer::find($id);
        $reviewer->delete();
        return redirect('/reviewer');

    }
}
