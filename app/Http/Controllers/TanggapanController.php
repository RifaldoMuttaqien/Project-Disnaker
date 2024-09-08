<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\APIResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreTanggapanRequest;
use App\Http\Requests\UpdateTanggapanRequest;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tanggapan = DB::table('tanggapan')->get();

        return new APIResource(true,'Data Tanggapan', $tanggapan);
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
    public function store(StoreTanggapanRequest $request)
    {
        //
        $enum = ['Pending','Proses','Ditolak','Selesai'];

        $valid = Validator::make($request->all(), [
            'tanggapan'=> 'nullable|string',
            'status'=> [
                'required|',
                Rule::in($enum),
            ], 
            'lampiran' => '',
            'tiket_pengaduan_id'=> 'required|unique',
        ]);


        $insert = DB::table('tanggapan')->insert([
            'tanggapan' => $request->tanggapan,
            'status' => $request->status,
            'lampiran' => $request->lampiran,
            'tiket_pengaduan_id' => $request->tiket_pengaduan_id,
        ]);

        return new APIResource($valid,'Penambahan Data Tanggapan Baru',
        [
            'data'=> [
                'tanggapan' => $request->tanggapan,
                'status' => $request->status,
                'lampiran' => $request->lampiran,
                'tiket_pengaduan_id' => $request->tiket_pengaduan_id,
            ],
            'status' => $insert,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tanggapan $tanggapan, $id)
    {
        //
        $show = DB::table('tanggapan')->where('id',$id)->get();

        return new APIResource(true,'Data Tanggapan Terpilih', $show);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTanggapanRequest $request, Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tanggapan $tanggapan)
    {
        //
    }
}
