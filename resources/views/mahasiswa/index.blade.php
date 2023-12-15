@extends('layout.main')

@section('title', 'Halaman Mahasiswa')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Mahasiswa</h4>
                <p class="card-description">
                Daftar Mahasiswa
                </p>
                <a href="{{ route('mahasiswa.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw">Tambah</a>
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Foto</th>
                        <th>Prodi</th>
                        <th>Fakultas</th>
                        <th>Aksi<th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $item)
                        <tr>
                            <td>{{ $item->npm }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->tempat_lahir }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td><img src="foto/{{ $item->foto }}" alt=""></td>
                            <td>{{ $item->prodi['nama'] }}</td>
                            <td>{{ $item->prodi->fakultas['nama'] }}</td>
                            {{-- {{ $item->fakultas->nama }} --}}
                            <td>
                                <form method="POST" action="{{ route('mahasiswa.destroy', $item->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm"
                                        data-toggle="tooltip" title='Delete'
                                        data-nama='{{ $item->nama }}'>Hapus</button>
                                        <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-xs btn-primary btn-rounded">Ubah</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection
