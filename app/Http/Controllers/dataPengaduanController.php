<?php

namespace App\Http\Controllers;
use App\Models\dataPengaduan;
use App\Models\Kategori;
use App\Models\Tanggapan;
use App\Models\TiketPengaduan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class dataPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        //
        $controllerAPI = new APIController();
        
        $data_pengaduans = $controllerAPI->tampilData();
        return view('datapengaduan.index', compact('data_pengaduans'));
        // dd($data_pengaduans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        $kategori = Kategori::all();
        return view('datapengaduan.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
        'no_handphone' => 'required|min:5',
        'nama' => 'required|min:5',
        'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        'tgl' => 'required|date',
        'body' => 'required|min:5',
        'kategori_id' => 'required|integer'
        ]);

        $foto = $request->file('foto');
        $fotoName = $foto->hashName();
        $foto->storeAs('public/datapengaduan1', $fotoName);

        dataPengaduan::create([
            'no_handphone' => $request->no_handphone,
            'nama' => $request->nama,
            'foto' => $fotoName,
            'tgl' => $request->tgl,
            'body' => $request->body,
            'kategori_id' => $request->kategori_id,
        ]);
        return redirect()->route('welcome')->with(['success' => 'Data Berhasil Disimpan!']);
      

    }
  

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
        $data_pengaduans = dataPengaduan::findOrFail($id);
        Storage::delete('public/datapengaduan1/'. $data_pengaduans->image);

        $data_pengaduans->delete();

        return redirect()->route('datapengaduan.index')->with(['Success' => 'Data Berhasil di hapus']);
    }
}
