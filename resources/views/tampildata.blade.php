@extends('layout.admin')

@section('content')

<body>
  <h1 class="text-center mb-4">EDIT DATA PEGAWAI</h1>

  <div class="container">
    
     <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
           <div class="card-body">
            <form action="/updatedata/{{ $data->id }}" methob="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama lengkap</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" 
                   aria-describedby="emailHelp" value="{{ $data->nama }}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis kelamin</label>
                <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                  <option selected>{{ $data->jeniskelamin }}</option>
                  <option value="cowo">cowo</option>
                  <option value="cewe">cewe</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No telpon</label>
                <input type="number" name="notelpon" class="form-control" id="exampleInputEmail1" 
                   aria-describedby="emailHelp" value="{{ $data->notelpon }}">
              </div>
            <button type="sumbit" class="btn btn-primary">sumbit</button>
      </div>
    </div>
  </div>
</div>
</div>
</body>

@endsection