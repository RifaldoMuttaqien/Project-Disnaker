<?php

namespace App\Http\Controllers;

use App\Models\TiketPengaduan;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\APIResource;
use Illuminate\Support\Facades\Validator;
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
        $valid = Validator::make($request->all(), [
            'ticket' => 'nullable|unique:tiket_pengaduan,ticket',
            'body'=> 'required|min:20|string',
            'lampiran'=> 'nullable',
            'tgl_awal'=> 'date',
            'tgl_akhir'=> 'nullable|date',
            'pengadu_id'=> 'required|integer',
            'kategori_id'=> 'required|integer',
        ]);

        if ($valid->fails()) {
            return response()->json($valid->errors(),422);
        }

        $store = DB::table('tiket_pengaduan')->create([
            'body' => $request->body,
            'lampiran' => $request->lampiran,
            'pengadu_id' => $request->pengadu_id,
            'kategori_id' => $request->kategori_id,
        ]);

        return new APIResource(true,'Penambahan Data Baru @ Tiket Pengaduan', 
        [
            'body' => $request->body,
            'lampiran' => $request->lampiran,
            'pengadu_id' => $request->pengadu_id,
            'kategori_id' => $request->kategori_id,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(TiketPengaduan $tiketPengaduan, $id)
    {
        //
        // $show = DB::table('tiket_pengaduan')
        // ->join('pengadu','tiket_pengaduan.id','=','pengadu.id')
        // ->join('kategori','tiket_pengaduan.id','=','kategori.id')
        // ->join('tanggapan','tiket_pengaduan.id','=','tanggapan.tiket_pengaduan_id')
        // ->select('tiket_pengaduan.*',  'pengadu.name as pengadu_id', 'pengadu.nik', 'pengadu.no_wa', 'kategori.kategori as kategori_id', 'tanggapan.tanggapan', 'tanggapan.status', 'tanggapan.lampiran as lampiran_tanggapan')
        // ->where('tiket_pengaduan.id',$id)
        // ->get()
        // ;

        $show = DB::table('tiket_pengaduan')
        ->where('id',$id)
        ->get();

        return new APIResource(true,'Menampilkan Data Pengaduan Terpilih', $show);
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
    public function update(UpdateTiketPengaduanRequest $request, TiketPengaduan $tiketPengaduan, $id)
    {
        // tiket pengaduan gabisa di edit secara alur sistem

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TiketPengaduan $tiketPengaduan, $id)
    {
        //
        $willDelete = DB::table('tiket_pengaduan')->where('id',$id)->get();
        $delete = DB::table('tiket_pengaduan')->where('id',$id)->delete();

        return new APIResource(false,'Data Pengaduan Dihapus', 
        [
            'Data yang dihapus: ' => $willDelete,
            'Status'=> $delete,
        ]);
    }
}
