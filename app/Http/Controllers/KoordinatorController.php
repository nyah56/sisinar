<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Reviewer;
use App\Models\Seminar;
use Illuminate\Http\Request;

class KoordinatorController extends Controller
{
    //
    public function index()
    {
        //
        $jurnal = Jurnal::all();
        return view('koordinator.koordinator', [

            'jurnal' => $jurnal,
        ]);
    }
    public function edit(string $id)
    {
        $jurnal = Jurnal::find($id);
        $seminar = Seminar::all();
        $reviewer = Reviewer::all();
        return view('koordinator.koordinator-edit', ['jurnal' => $jurnal, 'seminar' => $seminar, 'reviewer' => $reviewer]);
    }
    public function update(Request $request, string $id)
    {
        foreach($request->input('reviewer')as $k){
            dump($k);
        }
        // foreacgh
        //  if
        // else
        // if $request->reviewer[1] == 0

    }
}
