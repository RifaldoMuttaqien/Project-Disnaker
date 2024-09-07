<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\dataPengaduan;

class progressPengaduan extends Model
{
    protected $table = 'progress_pengaduan';
    use HasFactory;
    protected $fillable = [
        'pengaduan_id',
        'progress',
        'tanggal_progress',
    ];

    public function daftarPengaduan()
    {
        return $this->belongsTo(dataPengaduan::class, 'pengaduan_id');
    }
}
