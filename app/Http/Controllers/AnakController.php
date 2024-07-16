<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AnakController extends Controller
{
    //
    public function index()
    {
        $anaks = Anak::orderBy("created_at","desc")->where('user_id' , auth()->user()->id)->get();
        return view("user.anak" , compact('anaks'));
    }
    public function store(Request $request)
    {

        $userId = auth()->user()->id;
        $request->validate([
            'nik' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jk' => 'required|in:Laki-laki,Perempuan',
            'nohp_orangtua' => 'required|string|max:13',
            'tinggi' => 'required|integer',
            'berat' => 'required|integer',
        ]);

        Anak::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jk' => $request->jk,
            'nohp_orangtua' => $request->nohp_orangtua,
            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
            'user_id' => $userId,
        ]);

        return redirect()->route('anak.index')->with('success', 'Data anak berhasil ditambahkan');

    }


    public function detail($id){
    $anak = Anak::where('id' , $id)->with('cf' , 'cf.gejalas' ,'orangtua' , 'cf.gejalas.gejala')->first();
        return view("user.show" , compact('anak'));
    }
    public function edit($id ){
        $anak = Anak::where('id' , $id)->first();
        return view('user.anak.edit' ,compact('anak') );
    }

    public function update(Request $request, $id){
        Anak::where('id' , $id)->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jk' => $request->jk,
            'nohp_orangtua' => $request->nohp_orangtua,
            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
        ]);
        Alert::success('success','berhasil update data anak');
        return redirect()->route('anak.index')->with('success','');
    }

    public function destroy($id){
        Anak::where('id', $id)->delete();
        Alert::success('success','berhasil menghapus data anak');
        return redirect()->route('anak.index')->with('success','');
    }

}
