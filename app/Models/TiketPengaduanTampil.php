<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiketPengaduanTampil extends Model
{
    use HasFactory;
    protected $table = 'tiket_pengaduan';
    public $timestamps = false;
    protected $fillable = [ 'body', 'lampiran', 'tgl_awal', 'pengadu_id', 'kategori_id'];

    public function pengadu()
    {
        return $this->belongsTo(Pengadu::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
