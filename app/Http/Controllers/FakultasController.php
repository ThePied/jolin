<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkRole:admin')->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fakultas = Fakultas::all();
        // SELECT * FROM fakultas
        //dd($fakultas);
        return view("fakultas.index")->with("fakultas", $fakultas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("fakultas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // validasi data input
        $validasi = $request->validate([
            "nama" => "required|unique:fakultas"
        ]);
        // simpan data ke dalam tabel fakultas
        Fakultas::create($validasi);
        return redirect("fakultas")->with("success", "Data Fakultas berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fakultas = Fakultas::find($id);
        return view("fakultas.edit")->with("fakultas", $fakultas);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' =>'required'
        ]);
        Fakultas::find($id)->update($validasi);
        return redirect('fakultas')->with('success','Fakultas berhasil diperbarui');
        $fakultas = Fakultas::where('id', $id)->update($validate);
        if($fakultas)
        {
            $response['success'] = true;
            $response['message'] = 'Fakultas berhasil diperbarui';
            return response()->json($response, Response::HTTP_OK);
        }
        else
        {
            $response['success'] = false;
            $response['message'] = 'Fakultas gagal doperbarui';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($fakultas);
        $fakultas = Fakultas::find($id);
        $fakultas->delete();
        return redirect()->route('fakultas.index')->with('success', 'Fakultas a.n. '. $fakultas->nama.' berhasil dihapus.');
    }
}
