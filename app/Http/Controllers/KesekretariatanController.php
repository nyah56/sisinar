<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;

class KesekretariatanController extends Controller
{
    // public function index (){
    //     return view('kesekreariatan.Kesekretariatan');
    // }
    public function index()
    {
        //
        $jurnal = Jurnal::all();
        return view('kesekretariatan.Kesekretariatan', [

            'jurnal' => $jurnal,
        ]);
    }
    public function update(Request $request, string $id){
        
        $jurnal = Jurnal::find($id);
        $this->validate($request,[
            'pembayaran' => 'required'
        ]);
        $jurnal->update([
            'pembayaran' => $request->pembayaran,
        ]);
        return redirect('/kesekretariatan');

    }
}
