@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Halaman Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa fa-user"></i>
                        Profil
                    </div>
                    <div class="row ms-0">
                        <div class="col-md-4 mt-2 mb-2">
                            <img class="card-img-top w-30 h-30 mx-auto" src="{{Auth::user()->profil->foto ? asset('storage/'.Auth::user()->profil->foto) : asset('img/logo-unesa.png')}}" alt="Title">
                        </div>                      
                      <div class="col-md-8 mt-2 mb-2">                        
                        <table>
                            <tr>
                                <td width="10%">Nama</td>
                                <td width="5%"> : </td>
                                <td width="85%"> {{Auth::user()->name ?? '-'}}</td>
                            </tr>
                            <tr>
                                <td width="29%">Status</td>
                                <td width="1%">: </td>
                                <td width="70%"> {{Auth::user()->level_user->nama ?? 'Admin'}}</td>
                            </tr>
                            <tr>
                                <td width="29%">Prodi</td>
                                <td width="1%">: </td>
                                <td width="70%"> {{Auth::user()->profil->prodi->nama ?? '-'}}</td>
                            </tr>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa fa-book"></i>
                        Alamat dan Kontak
                    </div>
                    <div class="row ms-0">
                        {{-- <div class="col-md-4 mt-2 mb-2">
                            <img class="card-img-top w-20 h-20 mx-auto" src="{{asset('img/logo-unesa.png')}}" alt="Title">
                        </div>                       --}}
                      <div class="col-md-12 mt-2 mb-2">                        
                        <table>
                            <tr>
                                <td width="50%">Alamat</td>
                                <td width="5%"> : </td>
                                <td width="45%"> {{Auth::user()->profil->alamat ?? '-'}}</td>
                            </tr>
                            <tr>
                                <td width="29%">Email</td>
                                <td width="1%">: </td>
                                <td width="70%"> {{Auth::user()->profil->email ?? Auth::user()->email ?? '-'}}</td>
                            </tr>
                            <tr>
                                <td width="29%">No. Telp</td>
                                <td width="1%">: </td>
                                <td width="70%"> {{Auth::user()->profil->no_telp ?? '-'}}</td>
                            </tr>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data-data
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Skala</th>
                            <th>Tanggal Ditambahkan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pembuatan Aplikasi SMART-A Menggunakan Metode Waterfall dan Laravel</td>
                            <td>Artikel</td>
                            <td>Nasional</td>
                            <td>01-07-2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
