<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Pengadu;
use Illuminate\Support\Facades\Log;
use App\Models\TiketPengaduanTampil;
use Illuminate\Http\Request;

class TiketPengaduanTampilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch paginated list of TiketPengaduan
        $tiketPengaduan = TiketPengaduanTampil::paginate(10);
    
        // Pass the data to a view
        return view('dashboard.tiket.index', compact('tiketPengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();  // Ambil semua kategori
        $pengadu = Pengadu::all();    // Ambil semua pengadu
        return view('dashboard.tiket.create', compact('kategori', 'pengadu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
           
            'body' => 'required|string',
            'lampiran' => 'nullable|string',
            'tgl_awal' => 'required|date',
            'kategori_id' => 'required|integer',
            'pengadu_id' => 'required|integer',
        ]);
        $ticket = 'TIKET-' . strtoupper(uniqid());
        Log::info('Generated Ticket: '. $ticket);
        TiketPengaduanTampil::create([
            'ticket' => $ticket,
            'body' => $request->input('body'),
            'lampiran' => $request->input('lampiran'),
            'tgl_awal' => $request->input('tgl_awal'),
            'kategori_id' => $request->input('kategori_id'),
            'pengadu_id' => $request->input('pengadu_id'),
        ]);
    
        return redirect()->route('dashboard.tiket.index')->with('success', 'Tiket pengaduan berhasil dibuat');
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
    public function destroy(string $id)
    {
        //
    }
}
