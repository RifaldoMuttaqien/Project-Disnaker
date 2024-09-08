<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiketPengaduan extends Model
{
    use HasFactory;

    protected $table = 'tiket_pengaduan';
    protected $fillable = ['body', 'ticket', 'lampiran','tgl_awal','tgl_akhir','kategori_id', 'pengadu_id'];
    public $timestamps = false;
}
