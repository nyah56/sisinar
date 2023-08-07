<?php

namespace App\Http\Controllers;

use App\Models\DetailJurnal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class koortokController extends Controller
{
    public function updateRev2(string $id, Request $request)  {
        // $cekDetail = DetailJurnal::where('submission', '=', $id)->get()->first();
        // $idola = false;
        // $detailAll = DetailJurnal::all()->count();
        // $nambah = $detailAll + 1;
        // // dd($nambah);
        
        // for($y=0; $y<$detailAll; $y++){
        //     $cekReviewer2 = DetailJurnal::where('submission', '=', $id)->where('id_reviewer', '=', $request->reviewer2)->where('status','=',1)->exists();
        //     if($cekReviewer2){
        //         $idola = true;
        //     }else{
        //         $idola = false;
        //     }
        // }
        // dump($idola);
        // // dd($idola);

        // if(  $idola = false ){
        //      dd('Ngaw');
        //     DetailJurnal::create([
        //         'submission' => $id,
        //         'id_reviewer' => $request->reviewer2,
        //         'status' => $request->inputstatus2
        //     ]);
        // }else{
        //     dd('idola');
        //     DetailJurnal::where('submission',$id)->where('status',$request->inputstatus2)->update(['id_reviewer'=>$request->reviewer2]);
        // }

        // $cekDetail = DetailJurnal::where('submission', '=', $id)->get()->first();
        // $hayo = false;
        // $detailAll = DetailJurnal::all()->count();
        $cekReviewer = DetailJurnal::where('submission', '=', $id)->where('status','=',1)->exists();
        // $nambah = $detailAll + 1;
        // for($x=0; $x<$detailAll; $x++){
        //     if($cekReviewer){
        //         $hayo = true;
        //     }else{
        //         $hayo = false;
        //     }
        // }

        if($cekReviewer == false){
            DetailJurnal::create([
                'submission' => $id,
                'id_reviewer' => $request->reviewer2,
                'status' => 1
            ]);
        }else{
            DetailJurnal::where('submission',$id)->where('status',1)->update(['id_reviewer'=>$request->reviewer2]);
        }

        return redirect('/koordinator/edit/sementara/'.$id);
    }
}
