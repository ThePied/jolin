@extends('layout.main')
@section('title', 'Ubah Mahasiswa')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ubah Mahasiswa</h4>
                <p class="card-description"></p>
                <form class="forms-sample" method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="npm">Nomor Pokok Mahasiswa</label>
                        <input type="text" class="form-control" name="npm" placeholder="Nomor Pokok Mahasiswa" value="{{ $mahasiswa->npm }}">
                        @error('npm')
                         <label for="npm" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Program Studi" value="{{ $mahasiswa->nama }}">
                        @error('nama')
                         <label for="nama" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ $mahasiswa->tempat_lahir }}">
                        @error('tempat_lahir')
                         <label for="tempat_lahir" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ $mahasiswa->tanggal_lahir }}">
                        @error('tanggal_lahir')
                         <label for="tanggal_lahir" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto" placeholder="Tanggal Lahir" value="{{ $mahasiswa->foto }}" accept="image/png, image/jpeg, image/jpg">
                        @error('foto')
                         <label for="foto" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="prodi_id">Program Studi</label>
                        <select name="prodi_id" class="form-control">
                            @foreach ($prodi as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $mahasiswa->prodi_id ? "selected" : null }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('prodi_id')
                         <label for="nama" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ url('mahasiswa') }}" class="btn btn-light">Batal</a>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection
