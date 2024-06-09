<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'tentang';
    protected $fillable = [
        'nama',
        'visi',
        'misi',
        'sejarah',
        'alamat',
        'telp',
    ];
}
