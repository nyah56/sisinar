<?php

namespace App\Http\Controllers;

use App\Models\DetailJurnal;
use App\Models\Jurnal;
use App\Models\Reviewer;
use App\Models\Seminar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $cekDetailJunal = DetailJurnal::where('submission',$id)->exists();
        // dd($cekDetailJunal);
        return view('koordinator.koordinator-edit', ['jurnal' => $jurnal, 'seminar' => $seminar, 'reviewer' => $reviewer, 'DetailJurnal' => $cekDetailJunal]);
    }

    public function update(Request $request, string $id)
    {
        
    //  $cekDetail = DetailJurnal::where('submission', '=', $id)->get()->first();
    //  $cekReviewer = DetailJurnal::where('id_reviewer', '=', $request->reviewer)->get();
    //  if(is_null($cekDetail) || !$cekReviewer){
    //     DetailJurnal::create([
    //                     'submission' => $id,
    //                     'id_reviewer' => $request->reviewer,
    //                     'status' => $request->reviewerhidden
    //                 ]);
    //  }else{
    //     DetailJurnal::where('submission',$id)->where('status',$request->reviewerhidden)->update(['id_reviewer' => $request->reviewer]);
    //  }
    
     
        // 
        $status = 0;
        $cekDetail = DetailJurnal::where('submission', '=', $id)->get()->first();
        foreach($request->input('reviewer')as $k){ 
            
            $cekReviewer = DetailJurnal::where('id_reviewer', '=', $k)->exists();
            // $cekdoang = DetailJurnal::where('submission', $id)->where('id_reviewer',$request->reviewer[0])->get();
            // dd($cekdoang);
            
            if(is_null($cekDetail) || !$cekReviewer){// create data
                
                DetailJurnal::create([
                    'submission' => $id,
                    'id_reviewer' => $k,
                    'status' => $status
                ]);
                
            }else{// update data
               DetailJurnal::where('submission',$id)->where('status',$status)->update(['id_reviewer'=>$k]);
               
            }$status++;
        }
        // gawe detailjurnal
        // $status=1;
        // foreach($request->input('reviewer')as $k){
        //     dump($k,$status);
        //     $status++;
        // }
        // foreacgh
        //  if
        // else
        // if $request->reviewer[1] == 0

        // $status = 0;
        // // // Wrap the operations in a database transaction
        // foreach($request->input('reviewer')as $k){
           
        //     $post = DetailJurnal::updateOrCreate([
        //         'submission' => $id,
        //         'status' => $status,
        //     ],
        //     [ 'id_reviewer' =>$request->reviewer[$status],
        //     'id_reviewer' =>$request->reviewer[$status]
            
        //     ]);
        //     $status++;
        // }
        return redirect('/koordinator');
    }
}
