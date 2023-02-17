@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard v2</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>


        <div class="container">
            <a href="/tambahpegawai" class="btn btn-success">Tambah +</a>

            <div class="row g-3 align-items-center mt-2">
                <div class="col-auto">
                    <form action="/pegawai" methob="GET">
                        <input type="search" id="inputPassword6" name="search" class="form-control"
                            aria-describedby="passwordHelpInline">
                    </form>
                </div>

                <div class="col-auto">
                    <a href="/exportpdf" class="btn btn-info">Export PDF</a>
                </div>

            </div>
            <div class="row">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">foto</th>
                            <th scope="col">Jenis kelamin</th>
                            <th scope="col">No telpon</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $index => $row)
                            <tr>
                                <th scope="row">{{ $index + $data->firstItem() }}</th>
                                <td>{{ $row->nama }}</td>
                                <td>
                                    <img src="{{ asset('fotopegawai/' . $row->foto) }}" alt="" style="width: 40px;">
                                </td>
                                <td>{{ $row->jeniskelamin }}</td>
                                <td>0{{ $row->notelpon }}</td>
                                <td>{{ $row->created_at->format('D M Y') }}</td>
                                <td>

                                    <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}">Delete</a>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
            <script
            src="https://code.jquery.com/jquery-3.6.3.slim.js"
            integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc="
            crossorigin="anonymous"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </div>
        <script>
        $('.delete').click( function(){
            var pegawaiid = $(this).attr('data-id');
            swal({
                title: "Yakin?",
                text: "Kamu akan menghapus data pegawai dengan id "+pegawaiid+" ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/delete/"+pegawaiid+""
                    swal("Data berhasil di hapus", {
                    icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
        })
        </script>
    </div>
@endsection
