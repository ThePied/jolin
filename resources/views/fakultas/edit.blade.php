@extends('layout.main')
@section('title', 'Tambah Fakultas')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ubah Fakultas</h4>
                <form class="forms-sample" method="POST" action="{{ route('fakultas.update', $fakultas->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nama Fakultas</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Fakultas" value="{{ $fakultas->nama }}">
                        @error('nama')
                         <label for="nama" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Ubah</button>
                    <a href="{{ url('fakultas') }}" class="btn btn-light">Batal</a>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection
