<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataPengaduan extends Model
{
    use HasFactory;

  protected $table = 'daftar_pengaduans';
  public $timestamps  = false;
    protected $fillable = [
        'no_handphone',
        'nama',
        'foto',
        'tgl',
        'body',
        'kategori_id',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function progressPengaduan()
    {
        return $this->hasMany(progressPengaduan::class, 'pengaduan_id');
    }
    
}
