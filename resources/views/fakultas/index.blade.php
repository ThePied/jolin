@extends('layout.main')
@section('title', 'Fakultas')
@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Fakultas</h4>
                    <p class="card-description">
                        Daftar Fakuktas
                    </p>

                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('fakultas.create') }}" type="button"
                            class="btn btn-primary btn-rounded btn-fw">Tambah</a>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Fakultas</th>
                                    <th>Program Studi</th>
                                    @if (Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fakultas as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($item->prodi as $prodi)
                                                    <li>
                                                        {{ $prodi->nama }}
                                                        <ul>
                                                            @foreach ($prodi->mahasiswa as $mhs)
                                                                <li>
                                                                    {{ $mhs->nama }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>

                                            @if (Auth::user()->role == 'admin')
                                                <form method="POST" action="{{ route('fakultas.destroy', $item->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit"
                                                        class="btn btn-xs btn-danger btn-rounded show_confirm"
                                                        data-toggle="tooltip" title='Delete'
                                                        data-nama='{{ $item->nama }}'>Hapus</button>
                                                    <a href="{{ route('fakultas.edit', $item->id) }}"
                                                        class="btn btn-xs btn-primary btn-rounded">Ubah</a>
                                                </form>
                                            @endif
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
