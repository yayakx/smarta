@extends('layouts.main')

@php
    $user = Auth::user() ?? '';
    $profil = $user->profil ?? '';    
@endphp

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Profil</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Halaman Profil {{ $user->name ?? '' }}</li>
        </ol>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <span class="col-md-4"><i class="fa fa-user"></i> Profil</span>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit-profil"
                                class="btn btn-sm btn-success ms-auto col-md-2"><i class="fa fa-pencil"></i> Edit</a>
                        </div>
                    </div>
                    <div class="row ms-0">
                        <div class="col-md-4 mt-2 mb-2">
                            <img class="card-img-top w-30 h-30 mx-auto" src="{{$profil->foto ? asset('storage/'.$profil->foto) : asset('img/logo-unesa.png')}}"
                                alt="Title">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit-foto"
                            class="btn btn-sm btn-success mt-2 mb-2 col-md-12"><i class="fa fa-camera"></i> Ganti Foto</a>    
                        </div>
                        <div class="col-md-8 mt-2 mb-2">
                            <table>
                                <tr>
                                    <td width="10%">Nama</td>
                                    <td width="5%"> : </td>
                                    <td width="85%"> {{ $user->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td width="29%">Status</td>
                                    <td width="1%">: </td>
                                    <td width="70%"> {{ $user->level_user->nama ?? 'Admin' }}</td>
                                </tr>
                                <tr>
                                    <td width="29%">Prodi</td>
                                    <td width="1%">: </td>
                                    <td width="70%"> {{ $profil->prodi->nama ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td width="29%">Angkatan</td>
                                    <td width="1%">: </td>
                                    <td width="70%"> {{ $profil->angkatan ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td width="29%">
                                        @if ($user->level == 1)
                                            NIM
                                        @else
                                            NIP
                                        @endif
                                    </td>
                                    <td width="1%">: </td>
                                    <td width="70%"> {{ $profil->nomor_induk ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td width="29%">Jenis Kelamin</td>
                                    <td width="1%">: </td>
                                    <td width="70%"> {{ $profil->jk ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td width="29%">Tempat Lahir</td>
                                    <td width="1%">: </td>
                                    <td width="70%"> {{ $profil->tempat_lahir ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td width="29%">Tanggal Lahir</td>
                                    <td width="1%">: </td>
                                    <td width="70%"> {{ $profil->tanggal_lahir ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td width="29%">Agama</td>
                                    <td width="1%">: </td>
                                    <td width="70%"> {{ $profil->agama ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <span class="col-md-4"><i class="fa fa-book"></i> Alamat dan Kontak</span>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit-alamat"
                                class="btn btn-sm btn-success ms-auto col-md-2"><i class="fa fa-pencil"></i> Edit</a>
                        </div>
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
                                    <td width="45%"> {{ $profil->alamat ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td width="29%">Email</td>
                                    <td width="1%">: </td>
                                    <td width="70%"> {{ $profil->email ?? ($user->email ?? '-') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="29%">No. Telp</td>
                                    <td width="1%">: </td>
                                    <td width="70%"> {{ $profil->no_telp ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit-profil" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Edit Profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('update-profil') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $profil->id }}">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" value="{{ $profil->nama ?? ($user->name ?? '') }}"
                                name="nama">

                            <label for="nama">Status</label>
                            <input type="text" class="form-control" value="{{ $user->level_user->nama ?? 'Admin' }}"
                                readonly disabled>

                            <label for="nama">Prodi</label>
                            <select name="prodi_id" class="form-control">
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->id }}" @if ($profil->prodi_id === $item->id) selected @endif>
                                        {{ $item->nama }}</option>
                                @endforeach
                            </select>

                            <label for="nama">Angkatan</label>
                            <input type="number" name="angkatan" class="form-control"
                                value="{{ $profil->angkatan ?? '' }}">

                            <label for="nama">
                                @if ($user->level == 1)
                                    NIM
                                @else
                                    NIP
                                @endif
                            </label>
                            <input type="number" name="nomor_induk" class="form-control"
                                value="{{ $profil->nomor_induk ?? '' }}">

                            <label for="nama">Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value="Laki-laki" @if ($profil->jk == 'Laki-laki') selected @endif>Laki-laki
                                </option>
                                <option value="Perempuan" @if ($profil->jk == 'Perempuan') selected @endif>Perempuan
                                </option>
                            </select>

                            <label for="nama">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control"
                                value="{{ $profil->tempat_lahir ?? '' }}">

                            <label for="nama">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control"
                                value="{{ $profil->tanggal_lahir ?? '' }}">

                            <label for="nama">Agama</label>
                            <select name="agama" class="form-control">
                                <option value="Islam" @if ($profil->jk == 'Islam') selected @endif>Islam</option>
                                <option value="Kristen Katolik" @if ($profil->jk == 'Kristen Katolik') selected @endif>Kristen
                                    Katolik</option>
                                <option value="Kristen Protestan" @if ($profil->jk == 'Kristen Protestan') selected @endif>Kristen
                                    Protestan</option>
                                <option value="Hindu" @if ($profil->jk == 'Hindu') selected @endif>Hindu</option>
                                <option value="Budha" @if ($profil->jk == 'Budha') selected @endif>Budha</option>
                                <option value="Konghucu" @if ($profil->jk == 'Konghucu') selected @endif>Konghucu
                                </option>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary active" data-bs-dismiss="modal">Tutup</a>
                        <button type="Submit" class="btn btn-primary active">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit-alamat" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Edit Alamat dan Kontak</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('update-alamat') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $profil->id }}">
                        <div class="modal-body">
                            <label for="nama">Alamat</label>
                            <input type="text" class="form-control" value="{{ $profil->alamat ?? '' }}"
                                name="alamat">

                            <label for="nama">Email</label>
                            <input type="text" class="form-control"
                                value="{{ $profil->email ?? ($user->email ?? '') }}" readonly disabled>

                            <label for="nama">No. Telp</label>
                            <input type="text" class="form-control" value="{{ $profil->no_telp ?? '' }}"
                                name="no_telp">

                            <div class="modal-footer">
                                <a class="btn btn-secondary active" data-bs-dismiss="modal">Tutup</a>
                                <button type="Submit" class="btn btn-primary active">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit-foto" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Edit Foto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('update-foto') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $profil->id }}">
                        <div class="modal-body">
                            <label for="nama">Upload Foto</label>
                            <input type="file" class="form-control" accept="image/*" name="foto">

                            <div class="modal-footer">
                                <a class="btn btn-secondary active" data-bs-dismiss="modal">Tutup</a>
                                <button type="Submit" class="btn btn-primary active">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>       
    </div>
@endsection
