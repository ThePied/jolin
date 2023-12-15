@extends('layout.main')

@section('title', 'Halaman Dosen')

@section('content')
    <h2>List Dosen</h2>

    <table class="table table-striped table-hover">
        <tr>
            <th>Kode</th>
            <th>Nama</th>
        </tr>
    @foreach ($dosen as $item)
    <tr>
        <td>{{ $item["kode"] }}</td>
        <td>{{ $item["nama"] }}</td>
    </tr>
    @endforeach
    </table>
@endsection
