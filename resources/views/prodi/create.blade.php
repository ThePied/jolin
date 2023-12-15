@extends('layout.main')
@section('title', 'Tambah Program Studi')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tambah Program Studi</h4>
                <p class="card-description"></p>
                <form class="forms-sample" method="POST" action="{{ route('prodi.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nama Program Studi</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Program Studi" value="{{ old('nama') }}">
                        @error('nama')
                         <label for="nama" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nama Fakultas</label>
                        <select name="fakultas_id" class="form-control">
                            @foreach ($fakultas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('nama')
                         <label for="nama" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ url('prodi') }}" class="btn btn-light">Batal</a>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection
