<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Databse\Eloquent\Relations\BelongsTo;

class peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_peminjaman',
        'status',
        'denda',
        'catatan'
    ];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date',
        'tanggal_pengembalian' => 'date',
    ];

    protected function admin(): BelongsTo {
      return $this->BelongsTo(User::class, 'id_admin');  
    }

    protected function siswa(): BelongsTo {
        return $this->BelongsTo(siswa::class, 'id_siswa');
    }

    protected function buku(): BelongsTo {
        return $this->BelongsTo(buku::class, 'id_buku');
    }
}
