@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Berkas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Halaman Data Berkas Admin</li>
        </ol>
        <div class="row">
            <div class="col-xl-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa fa-book"></i>
                        Total Berkas
                    </div>
                    <div class="row ms-0">
                        <div class="col-md-12 mt-2 mb-2 text-center">
                            <h3 class="my-3"><b>{{ $total_berkas }}</b></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa fa-stop"></i>
                        Total Berkas Belum Terverifikasi
                    </div>
                    <div class="row ms-0">
                        <div class="col-md-12 mt-2 mb-2 text-center">
                            <h3 class="my-3"><b>{{ $total_berkas - $total_verified }}</b></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa fa-check"></i>
                        Total Berkas Terverifikasi
                    </div>
                    <div class="row ms-0">
                        <div class="col-md-12 mt-2 mb-2 text-center">
                            <h3 class="my-3"><b>{{ $total_verified }}</b></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session('deleteSuccess'))
            <div class="alert alert-success col-md-12">
                Data Berhasil Dihapus
            </div>
        @endif

        @if (session('tambahSuccess'))
            <div class="alert alert-success col-md-12">
                Data Berhasil Ditambahkan
            </div>
        @endif

        @if (session('editSuccess'))
            <div class="alert alert-success col-md-12">
                Data Berhasil diedit
            </div>
        @endif

        @if (session('verifikasiSuccess'))
            <div class="alert alert-success col-md-12">
                Data Berhasil diverifikasi
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fas fa-table me-1"></i>
                        Data-data
                    </div>
                    {{-- <a class="ms-auto btn btn-sm btn-dark col-md-2" href="#" id="exportButton"><i
                            class="fa fa-download"></i> Download Rekap</a> --}}
                </div>
            </div>
            <div class="card-body">
                <table id="berkasAdmin">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Link</th>
                            <th>Kategori</th>
                            <th>Skala</th>
                            <th>Status</th>
                            <th>Tanggal Ditambahkan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($berkas as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->judul ?? '' }}</td>
                                <td><a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a></td>
                                <td>{{ $item->kategori->nama ?? '' }}</td>
                                <td>{{ $item->skala->nama ?? '' }}</td>
                                <td>
                                    @if ($item->is_verified)
                                    <div class="badge bg-success">Terverifikasi</div>@else<div class="badge bg-danger">
                                            Belum diverifikasi</div>
                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('d-m-Y') ?? '' }}</td>
                                <td>
                                    <div class="row ms-0 col-md-12">
                                        {{-- <a href="#" class="btn btn-sm btn-dark col-md me-2 edit-button" data-bs-toggle="modal" data-bs-target="#editBerkas" data-item="{{ json_encode($item) }}"><i class="fa fa-pencil"></i></a> --}}
                                        @if (!$item->is_verified)
                                            <a href="#"
                                                onclick="confirmVerifikasi('/verifikasi-berkas/{{ $item->id }}')"
                                                class="btn btn-sm btn-success col-md"><i class="fa fa-check"></i></a>
                                        @endif
                                        <a href="#" onclick="confirmDelete('/hapus-berkas/{{ $item->id }}')"
                                            class="btn btn-sm btn-danger col-md"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahBerkas" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Tambah Berkas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('tambah-berkas') }}">
                        @csrf
                        <label for="nama">Judul</label>
                        <input type="text" class="form-control" value="" name="judul" placeholder="Judul Berkas">

                        <label for="nama">Link Berkas</label>
                        <input type="text" class="form-control" value="" name="link" placeholder="https://">

                        <label for="nama">Kategori</label>
                        <select name="kategori_id" class="form-control">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>

                        <label for="nama">Skala</label>
                        <select name="skala_id" class="form-control">
                            @foreach ($skala as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
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

    <div class="modal fade" id="editBerkas" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Tambah Berkas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('edit-berkas') }}">
                        @csrf
                        <input type="hidden" class="form-control" value="" name="id" id="id">

                        <label for="nama">Judul</label>
                        <input type="text" class="form-control" value="" name="judul"
                            placeholder="Judul Berkas" id="judul">

                        <label for="nama">Link Berkas</label>
                        <input type="text" class="form-control" value="" name="link" placeholder="https://"
                            id="link">

                        <label for="nama">Kategori</label>
                        <select name="kategori_id" class="form-control" id="kategori_id">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>

                        <label for="nama">Skala</label>
                        <select name="skala_id" class="form-control" id="skala_id">
                            @foreach ($skala as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
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
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $(".edit-button").click(function() {
                var itemData = $(this).data("item");
                console.log(itemData, itemData.id)
                $("#editBerkas #id").val(itemData.id);
                $("#editBerkas #judul").val(itemData.judul);
                $("#editBerkas #link").val(itemData.link);
                $("#editBerkas #kategori_id").val(itemData.kategori_id);
                $("#editBerkas #skala_id").val(itemData.skala_id);
            });
        });

        function confirmDelete(url) {
            if (confirm("Apakah Anda yakin akan menghapus data ini?")) {
                window.location.href = url;
            }
        }

        function confirmVerifikasi(url) {
            if (confirm("Apakah Anda yakin akan memverifikasi data ini?")) {
                window.location.href = url;
            }
        }

        var table = $('#berkasAdmin').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        });      
    </script>
@endsection
