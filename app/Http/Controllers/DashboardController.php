<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::all();
        $grafik_mahasiswa = DB::select("SELECT prodis.nama, COUNT(*) as jumlah FROM prodis JOIN mahasiswas ON prodis.id = mahasiswas.prodi_id GROUP BY prodis.nama");
        $grafik_jk = DB::select("SELECT jk, COUNT(*) as jumlah FROM mahasiswas GROUP BY jk");
        return view('dashboard')
        ->with('fakultas', $fakultas)
        ->with('prodi', $prodi)
        ->with('mahasiswa', $mahasiswa)
        ->with('grafik_mhs', $grafik_mahasiswa)
        ->with('grafik_jk', $grafik_jk);
    }
}
