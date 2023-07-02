<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\ProdiUser;
use App\Models\ProfilUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function profil() {
        $data['prodi'] = ProdiUser::get();
        return view('profil')->with($data);
    }

    public function updateProfil(Request $request) {

        $profil = ProfilUser::find($request->id);
        $profil->nama = $request->nama;
        $profil->prodi_id = $request->prodi_id;
        $profil->angkatan = $request->angkatan;
        $profil->nomor_induk = $request->nomor_induk;
        $profil->jk = $request->jk;
        $profil->tempat_lahir = $request->tempat_lahir;
        $profil->tanggal_lahir = $request->tanggal_lahir;
        $profil->agama = $request->agama;
        $profil->save();

        return redirect('profil');
    }

    public function updateAlamatdanKontak(Request $request) {

        $profil = ProfilUser::find($request->id);
        $profil->alamat = $request->alamat;
        $profil->email = $request->email;
        $profil->no_telp = $request->no_telp;
        $profil->save();

        return redirect('profil');
    }

    public function updateFoto(Request $request) {
        // Validate the uploaded file
        $request->validate([
            'foto' => 'required|image|max:2048', // Adjust the validation rules as per your requirements
        ]);

        // Store the uploaded image
        $imagePath = $request->file('foto')->store('images', 'public');        

        $profil = ProfilUser::find($request->id);
        if ($profil->foto) {
            $delete = Storage::delete('public/'.$profil->foto);
        }
        $profil->foto = $imagePath;        
        $profil->save();

        return redirect()->back()->with('success', 'Image uploaded successfully');
    }
}
