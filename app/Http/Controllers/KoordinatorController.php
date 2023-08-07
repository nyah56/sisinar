<?php

namespace App\Http\Controllers;

use App\Models\DetailJurnal;
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
        $detail1 = DetailJurnal::where('submission', $id)->where('status', 0)->get();
        // dd($detail1);
        $detail2 = DetailJurnal::where('submission', $id)->where('status', 1)->get();
        // dd($cekDetailJunal);
        return view('koordinator.koordinator-edit', [
            'jurnal' => $jurnal,
            'seminar' => $seminar,
            'reviewer' => $reviewer,
            'detail1' => $detail1,
            'detail2' => $detail2,
        ]);
    }

    public function update(Request $request, string $id)
    {

        function reviewer1(String $submission, String $request)
        {

            $cekDetail = DetailJurnal::where('submission', '=', $submission)->get()->first();
            if (is_null($cekDetail)) {
                DetailJurnal::create([
                    'submission' => $submission,
                    'id_reviewer' => $request,
                    'status' => 0,
                ]);
            } else {
                DetailJurnal::where('submission', $submission)->where('status', 0)->update(['id_reviewer' => $request]);
            }
        }

        function reviewer2(String $submission, String $request)
        {
            $cekReviewer = DetailJurnal::where('submission', '=', $submission)->where('status', '=', 1)->exists();

            if (!$cekReviewer) {
                DetailJurnal::create([
                    'submission' => $submission,
                    'id_reviewer' => $request,
                    'status' => 1,
                ]);
            } else {
                DetailJurnal::where('submission', $submission)->where('status', 1)->update(['id_reviewer' => $request]);
            }
        }
        // reviewer1($id, $request->reviewer1);
        // reviewer2($id, $request->reviewer2);
        $jurnal = Jurnal::find($id);
        $this->validate($request, [

            'status' => 'required',
        ]);
        $jurnal->update([

            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);
        if ($request->reviewer2 == 0) {
            reviewer1($id, $request->reviewer1);

        } else {
            reviewer1($id, $request->reviewer1);
            reviewer2($id, $request->reviewer2);
        }

        return redirect('/koordinator');
    }
}
