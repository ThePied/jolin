@extends('layout.main')
@section('title', 'Ubah Prodi')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ubah Prodi</h4>
                <form class="forms-sample" method="POST" action="{{ route('prodi.update', $prodi->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nama Prodi</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Prodi" value="{{ $prodi->nama }}">
                        @error('nama')
                         <label for="nama" class="text-danger">{{ $message }}</label>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Fakultas</label>
                          <select name="fakultas_id" class="form-control">
                            @foreach ($fakultas as $item)
                                <option value="{{$item->id}}"{{$item->id ==
                                $prodi->fakultas_id ? "selected" : null}}>{{$item
                                ->nama}}</option>
                            @endforeach
                          </select>
                          @error('fakultas_id')
                                <label for="nama" class="text-danger">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Ubah</button>
                    <a href="{{ url('prodi') }}" class="btn btn-light">Batal</a>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection
