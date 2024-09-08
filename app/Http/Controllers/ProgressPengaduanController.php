<?php

namespace App\Http\Controllers;

use App\Models\dataPengaduan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\dataPengaduanController;

class ProgressPengaduanController extends Controller
{
    //
    public function index(): View
    {
        $dataPengaduan  = dataPengaduan::with('kategori')->where('status', 'progress')->latest()->paginate(10);
    return view('dataPengaduan.progressPengaduan', compact('dataPengaduan'));
}
public function progress($id): RedirectResponse
{
    $dataPengaduan = dataPengaduan::find($id);

    if(!$dataPengaduan){
        return redirect()->route('datapengaduan.index')->with('error', 'Data pengaduan tidak di temukan');
    }

    $dataPengaduan->status = 'progress';
    $dataPengaduan->save();

    return redirect()->route('progressPengaduan.index')->with('success', 'Data berhasil diproses');
}
public function destroy(string $id): RedirectResponse
    {
        //
        $dataPengaduan = dataPengaduan::findOrFail($id);
        Storage::delete('public/datapengaduan1/'. $dataPengaduan->image);

        $dataPengaduan->delete();

        return redirect()->route('progressPengaduan.index')->with(['Success' => 'Data Berhasil di hapus']);

    }

}
