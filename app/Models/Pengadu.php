<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadu extends Model
{
    use HasFactory;

    protected $table = 'pengadu';
    protected $fillabel = ['nik', 'nama', 'no_wa', 'tiket_id', 'pengaduan_id'];
    public $timestamp = false;
}
