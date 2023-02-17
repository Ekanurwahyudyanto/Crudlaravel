@extends('layout.admin')

@section('content')
<body>
  <h1 class="text-center mb-4">TAMBAH DATA PEGAWAI</h1>

  <div class="container">
    
     <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
           <div class="card-body">
            <form action="/insertdata" methob="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama lengkap</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" 
                   aria-describedby="emailHelp">
                   @error('nama')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis kelamin</label>
                <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                  <option selected>Pilih jenis kelamin</option>
                  <option value="cowo">cowo</option>
                  <option value="cewe">cewe</option>
               
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No telpon</label>
                <input type="number" name="notelpon" class="form-control" id="exampleInputEmail1" 
                   aria-describedby="emailHelp">
                   @error('notelpon')
                        <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Masukan foto</label>
                <input type="file" name="foto" class="form-control">
              </div>
            <button type="sumbit" class="btn btn-primary">sumbit</button>
      </div>
    </div>
  </div>
</div>
</div>
@endsection