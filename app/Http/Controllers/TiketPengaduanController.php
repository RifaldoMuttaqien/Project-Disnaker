<?php

namespace App\Http\Controllers;

use App\Http\Resources\APIResource;
use App\Models\TiketPengaduan;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTiketPengaduanRequest;
use App\Http\Requests\UpdateTiketPengaduanRequest;

class TiketPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tiketPengaduan = DB::table("tiket_pengaduan")->get();

        return new APIResource(true, 'Data Tiket Pengaduan', $tiketPengaduan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTiketPengaduanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TiketPengaduan $tiketPengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TiketPengaduan $tiketPengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTiketPengaduanRequest $request, TiketPengaduan $tiketPengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TiketPengaduan $tiketPengaduan)
    {
        //
    }
}
