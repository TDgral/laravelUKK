<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_buku',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'kategori',
        'isbn',
        'jumlah_halaman',
        'deskripsi',
        'stok',
        'lokasi_rak',
        'cover_image',
    ];

    public function KategoriBuku(): BelongsTo {
        return $this->BelongsTo(kategoriBuku::class, 'kategori');
    }

    protected $casts = [
        'tahun_terbit' => 'date',
    ];
}
