<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan';
    protected $fillable = ['tanggapan', 'status', 'lampiran', 'tiket_pengaduan_id'];
    public $timestamps = false;
}
