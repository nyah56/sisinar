<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;

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
}
