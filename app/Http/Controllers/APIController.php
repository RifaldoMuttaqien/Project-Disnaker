<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\APIResource;
use Illuminate\Support\Facades\Date;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function pengaduanBaru(Request $request)
    {
        $tiket = DB::table("tiket_pengaduan")->insert([
            'ticket' => fake()->uuid(),
            'body' => $request->pengaduan,
            'lampiran'=> $request->lampiran,
            'pengadu_id'=> $request->pengadu_id,
            'kategori_id'=> $request->kategori_id,
        ]);
        $tanggapan = DB::table("tanggapan")->insert([
            'tanggapan' => '',
            'status'=> 'Pending',
            'lampiran'=> '',
            'tiket_pengaduan_id'=> DB::table('tiket_pengaduan')->select('tiket_pengaduan.id')->latest('id')->first()->id,
        ]);

        return new APIResource(true, 'Penambahan Data Pengaduan Berhasil', [
            [
                'body' => $request->pengaduan,
                'lampiran'=> $request->lampiran,
                'pengadu_id'=> $request->pengadu_id,
                'kategori_id'=> $request->kategori_id,
            ]
        ]);
    }

    public function ambilTanggapan($id)
    {
        $dataTanggapan = DB::table('tanggapan')->where('tanggapan.tiket_pengaduan_id', $id)
        ->join('tiket_pengaduan','tanggapan.tiket_pengaduan_id','=','tiket_pengaduan.id')
        ->join('pengadu','tiket_pengaduan.pengadu_id','=','pengadu.id')
        ->join('kategori','tiket_pengaduan.kategori_id','=','kategori.id')
        ->select('tanggapan.*', 'tiket_pengaduan.ticket', 'tiket_pengaduan.body as isi_pengaduan', 'tiket_pengaduan.lampiran as lampiran_pengaduan', 'tiket_pengaduan.tgl_awal', 'tiket_pengaduan.tgl_akhir', 'kategori.kategori as kategori_id',  'pengadu.name as pengadu_id', 'pengadu.nik', 'pengadu.no_wa')
        ->get();

        return new APIResource(true,'Berhasil mendapatkan data', $dataTanggapan);
    }

    public function ubahTanggapan($id, Request $request)
    {
        $before = DB::table('tanggapan')->where('id', $id)->get();
        
        $data = [
            'tanggapan' => $request->tanggapan,
            'tanggapan.lampiran'=> $request->lampiran,
            'status' => $request->status,
        ];

        if ($request ->status == 'Selesai') {
            $data['tiket_pengaduan.tgl_akhir'] = now();
        }

        $updateTanggapan = DB::table('tanggapan')->where('tanggapan.id',$id)
        ->join('tiket_pengaduan','tanggapan.id','=','tiket_pengaduan.id')
        ->update($data);

        return new APIResource(true,'Data tanggapan berhasil diubah', [
            'Data Sebelumnya' => $before,
            'Data Setelah'=> $data,
        ]);
    }

    public function cariTiket(Request $request){
        
        $dataTiket = DB::table('tiket_pengaduan')
        ->join('pengadu','tiket_pengaduan.pengadu_id','=','pengadu.id')
        ->join('kategori','tiket_pengaduan.kategori_id','=','kategori.id')
        ->join('tanggapan','tiket_pengaduan.id','=','tanggapan.tiket_pengaduan_id')
        ->select('tiket_pengaduan.*',  'pengadu.name as pengadu_id', 'pengadu.nik', 'pengadu.no_wa', 'kategori.kategori as kategori_id', 'tanggapan.tanggapan', 'tanggapan.status', 'tanggapan.lampiran as lampiran_tanggapan')
        ->where('tiket_pengaduan.ticket', $request->tiket)
        ->get();

        return new APIResource(true,'Berhasil mendapatkan data', $dataTiket);
    }

    public function cariPengadu(Request $request){
        $dataPengadu = DB::table('pengadu')
        ->rightJoin('tiket_pengaduan','pengadu.id','=','tiket_pengaduan.pengadu_id')
        ->join('tanggapan','tiket_pengaduan.id','=','tanggapan.tiket_pengaduan_id')
        ->join('kategori','tiket_pengaduan.kategori_id','=','kategori.id')
        ->select('pengadu.name', 'pengadu.nik', 'pengadu.no_wa', 'tiket_pengaduan.ticket', 'tiket_pengaduan.body as isi_pengaduan', 'tiket_pengaduan.lampiran as lampiran_pengaduan', 'tiket_pengaduan.tgl_awal', 'tiket_pengaduan.tgl_akhir', 'kategori.kategori as kategori_id', 'tanggapan.tanggapan', 'tanggapan.status', 'tanggapan.lampiran as lampiran_tanggapan')
        ->where('pengadu.nik', $request->nik)
        ->get();

        return new APIResource(true,'Berhasil mendapatkan data', $dataPengadu);
    }

    public function tampilData(){

        $show = DB::table('tiket_pengaduan')
        ->leftJoin('pengadu','tiket_pengaduan.pengadu_id','=','pengadu.id')
        ->leftJoin('kategori','tiket_pengaduan.kategori_id','=','kategori.id')
        ->leftJoin('tanggapan','tiket_pengaduan.id','=','tanggapan.tiket_pengaduan_id')
        ->select('tiket_pengaduan.*',  'pengadu.name as pengadu_id', 'kategori.kategori as kategori_id' , 'pengadu.nik', 'pengadu.no_wa')
        ->get();

        return new APIResource(true,'Berhasil mendapatkan data', $show);
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
    public function store(Request $request)
    {
        //
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
