<?php

namespace App\Http\Controllers;
use App\Models\Pengadu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PengaduTampilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //manual data
        $pengadu = Pengadu::paginate(10);
        return view('dashboard.index', compact('pengadu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //nampilan form
        return view('dashboard.view');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'nik' => 'required',
            'name' => 'required',
            'no_wa' => 'required',
        ]);

        Pengadu::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'no_wa' => $request->no_wa,
        ]);
        return redirect()->route('dashboard.create')->with(['success' => 'Data Berhasil disimpan']);
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
