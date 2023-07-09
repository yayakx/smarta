<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\ProdiUser;
use App\Models\ProfilUser;
use App\Models\DataBerkas;
use App\Models\SkalaBerkas;
use App\Models\KategoriBerkas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

    public function dashboard() {
        $data['berkas'] = DataBerkas::with(['kategori', 'skala'])->where('user_id', Auth::user()->id)->get();                

        return view('dashboard')->with($data);
    }

    public function dataUser() {
        $data['berkas'] = DataBerkas::with(['kategori', 'skala'])->where('user_id', Auth::user()->id)->get();
        $data['total_berkas'] = $data['berkas']->count();
        $data['total_verified'] = DataBerkas::with(['kategori', 'skala'])->where('user_id', Auth::user()->id)->where('is_verified', 1)->count();

        $data['skala'] = SkalaBerkas::get();
        $level = Auth::user()->level ?? '';
        if ($level == 0) {
            $get_kategori = KategoriBerkas::get();
        } else {
            $get_kategori = KategoriBerkas::where('level_user_id', $level)->get();
        }
        $data['kategori'] = $get_kategori;

        return view('data-berkas')->with($data);
    }

    public function tambahBerkas(Request $request) {

        $berkas = new DataBerkas;
        $berkas->user_id = Auth::user()->id;
        $berkas->judul = $request->judul;
        $berkas->link = $request->link;
        $berkas->kategori_id = $request->kategori_id;
        $berkas->skala_id = $request->skala_id;
        $berkas->save();

        session()->flash('tambahSuccess', true);

        return redirect('data-user');
    }

    public function editBerkas(Request $request) {

        $berkas = DataBerkas::find($request->id);        
        $berkas->judul = $request->judul;
        $berkas->link = $request->link;
        $berkas->kategori_id = $request->kategori_id;
        $berkas->skala_id = $request->skala_id;
        $berkas->save();

        session()->flash('editSuccess', true);

        return redirect('data-user');
    }

    public function dataAdmin() {
        $data['berkas'] = DataBerkas::with(['kategori', 'skala'])->where('user_id', Auth::user()->id)->get();
        $data['total_berkas'] = $data['berkas']->count();
        $data['total_verified'] = DataBerkas::with(['kategori', 'skala'])->where('user_id', Auth::user()->id)->where('is_verified', 1)->count();

        $data['skala'] = SkalaBerkas::get();
        $level = Auth::user()->level ?? '';
        if ($level == 0) {
            $get_kategori = KategoriBerkas::get();
        } else {
            $get_kategori = KategoriBerkas::where('level_user_id', $level)->get();
        }
        $data['kategori'] = $get_kategori;

        return view('data-admin')->with($data);
    }

    public function hapusBerkas($id) {        

        $berkas = DataBerkas::find($id);        
        $berkas->delete();
        
        session()->flash('deleteSuccess', true);

        return redirect('data-user');
    }

    public function verifikasiBerkas(Request $request) {

        $berkas = DataBerkas::find($request->id);        
        $berkas->is_verified = 1;
        $berkas->verified_at = Carbon::now();       
        $berkas->save();

        session()->flash('verifikasiSuccess', true);

        return redirect('data-admin');
    }

    public function dataMaster() {
        $data['berkas'] = DataBerkas::with(['kategori', 'skala'])->where('user_id', Auth::user()->id)->get();
        $data['total_berkas'] = $data['berkas']->count();
        $data['total_verified'] = DataBerkas::with(['kategori', 'skala'])->where('user_id', Auth::user()->id)->where('is_verified', 1)->count();

        $data['skala'] = SkalaBerkas::get();
        $level = Auth::user()->level ?? '';
        if ($level == 0) {
            $get_kategori = KategoriBerkas::get();
        } else {
            $get_kategori = KategoriBerkas::where('level_user_id', $level)->get();
        }
        $data['kategori'] = $get_kategori;

        return view('dashboard-admin')->with($data);
    }
}
