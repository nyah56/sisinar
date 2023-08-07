<?php

namespace App\Http\Controllers;

use App\Models\DetailJurnal;
use App\Models\Jurnal;
use App\Models\Reviewer;
use App\Models\Seminar;
use Illuminate\Http\Request;

class KoordinatorSementaraController extends Controller
{
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
        $detail1 = DetailJurnal::where('submission',$id)->where('status',0)->get();
        // dd($detail1);
        $detail2 = DetailJurnal::where('submission',$id)->where('status',1)->get();
        $cekDetailJunal = DetailJurnal::where('submission',$id)->exists();
        // dd($cekDetailJunal);
        return view('koordinator.koordinator-edit-rev', ['jurnal' => $jurnal, 'seminar' => $seminar, 'reviewer' => $reviewer, 'DetailJurnal' => $cekDetailJunal, 'detail1'=>$detail1,'detail2'=>$detail2]);
    }

    public function update(Request $request, string $id)
    {
        
        Jurnal::where('submission',$id)->update(['status'=> $request->status]);

        return redirect('/koordinator/edit/sementara/'.$id);
    }
    public function updateRev1(string $id, Request $request)  {
        $cekDetail = DetailJurnal::where('submission', '=', $id)->get()->first();
        // $hayo = false;
        // $detailAll = DetailJurnal::all()->count();
        $cekReviewer = DetailJurnal::where('submission', '=', $id)->where('status','=',$request->inputstatus1)->exists();
        // $nambah = $detailAll + 1;
        // for($x=0; $x<$detailAll; $x++){
        //     if($cekReviewer){
        //         $hayo = true;
        //     }else{
        //         $hayo = false;
        //     }
        // }

        if(is_null($cekDetail)|| $hayo = false){
            DetailJurnal::create([
                'submission' => $id,
                'id_reviewer' => $request->reviewer1,
                'status' => $request->inputstatus1
            ]);
        }else{
            DetailJurnal::where('submission',$id)->where('status',$request->inputstatus1)->update(['id_reviewer'=>$request->reviewer1]);
        }

        return
         redirect('/koordinator/edit/sementara/'.$id);
    }
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
