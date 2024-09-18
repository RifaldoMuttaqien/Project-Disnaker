<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadu extends Model
{
    use HasFactory;

    protected $table = 'pengadu';
    protected $fillabel = ['nik', 'name', 'no_wa'];
    public $timestamps = false;

    public function tiketPengaduan()
    {
        return $this->hasMany(TiketPengaduan::class, 'pengadu_id');
    }
}
