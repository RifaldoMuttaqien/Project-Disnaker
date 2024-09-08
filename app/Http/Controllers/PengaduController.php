<?php

namespace App\Http\Controllers;
use App\Http\Resources\APIResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengaduController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data
        $pengadu = DB::table('pengadu')->get();

        return new APIResource(true, 'Data Pengadu', $pengadu);
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
        $valid = Validator::make($request->all(), [
            'name' => 'required|min:5|string',
            'nik' => 'required|integer|unique:pengadu,nik',
            'no_wa' => 'required|unique:pengadu,no_wa',
        ]);

        if ($valid->fails()) {
            return response()->json([$valid->errors(), 422]);
        }

        $insert = DB::table('pengadu')->insert([
            'name' => $request->name,
            'nik' => $request->nik,
            'no_wa' => $request->no_wa,
        ]);

        return new APIResource(
            true,
            'Data Pengadu Ditambahkan',
            [
                'Data yang Ditambahkan : ' =>
                [
                    'name' => $request->name,
                    'nik' => $request->nik,
                    'no_wa' => $request->no_wa,
                ],
                'Status' => $insert,
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $show = DB::table('pengadu')->where('id', $id)->get();

        return new APIResource(true,'Data Terpilih Pengadu', $show);
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
        $valid = Validator::make($request->all(), [
            'name'=> 'required|min:5|string',
            'nik'=> 'required|integer|unique:pengadu,nik',
            'no_wa'=> 'required|unique:pengadu,no_wa',
        ]);

        if ($valid->fails()) {
            return response()->json([$valid->errors(), 422]);
        }

        $update = DB::table('pengadu')->where('id',$id)->update([
            'name'=> $request->name,
            'nik'=> $request->nik,
            'no_wa'=> $request->no_wa,
        ]);

        return new APIResource(true, 'Data Pengadu Berhasil Diubah', 
    [
        'Data Terubah : ' => 
        [   'name'=> $request->name,
            'nik'=> $request->nik,
            'no_wa'=> $request->no_wa,
        ],
        'Status' => $update,
    ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $willDelete = DB::table('pengadu')->where('id', $id)->get();
        $delete = DB::table('pengadu')->where('id', $id)->delete();

        return new APIResource(true,'Data Pengadu Dihapus', 
        [
            'Data yang Dihapus' => $willDelete,
            'Status' => $delete
        ]);
    }
}
