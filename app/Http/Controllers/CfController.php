<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\CfGejala;
use App\Models\CfUser;
use App\Models\Gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CfController extends Controller
{
    //
    public function konsultasi($id)
    {
        $gejalas = Gejala::notArchived()->get();
        $anak = Anak::where('id', $id)->first();
        return view('user.periksa', compact('gejalas', 'anak'));
    }

    public function calculateCF(Request $request, $id)
    {
        $gejalas = Gejala::all();
        $inputGejalas = $request->input('gejala');
      

        $CFcombine = 0;
        $isFirst = true;

        $cfData = CfUser::create([
            'user_id' => auth()->user()->id,
            'anak_id' => $id,
            'cf' => "0"
        ]);

        foreach ($inputGejalas as $gejalaId => $userInput) {
            if ($userInput > 0) {
                $gejala = $gejalas[$gejalaId];
                $bobot = $gejala->bobot;
                $CF = $bobot * $userInput;

                if ($isFirst) {
                    $CFcombine = $CF;
                    $isFirst = false;
                } else {
                    $CFcombine = $CFcombine + $CF * (1 - $CFcombine);
                }

                CfGejala::create([
                    'gejala_id' => $gejala->id,
                    'cf_id' => $cfData->id,
                    'bobot' => $userInput
                ]);
            }
        }

        $CFcombine = round($CFcombine, 4);
        $cfData->cf =$CFcombine;
        $cfData->save();

        session([
            'cfDataId' => $cfData->id,
            'CFcombine' => $CFcombine,
            'anakId' => $id
        ]);

        return view('user.confirm_cf', ['cfCombine' => $CFcombine]);
    }

    public function confirmCF(Request $request)
    {
        $cfDataId = session('cfDataId');
        $CFcombine = session('CFcombine');
        $anakId = session('anakId');

        if ($request->input('action') == 'commit') {
            Alert::success('Hasil pemeriksaan disimpan');
            return redirect()->route('anak.show', ['id' => $anakId]);
        } else {
            CfUser::where('id' , $cfDataId)->delete();
            Alert::info('Hasil pemeriksaan tidak disimpan');
            return redirect()->route('anak.show', ['id' => $anakId])->withErrors('Pemeriksaan stunting dibatalkan');
        }
    }
}
