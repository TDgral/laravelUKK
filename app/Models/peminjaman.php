<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $guarded = [];

    protected $fillable = [
        'kode_peminjaman',
        'id_siswa',
        'id_admin',
        'id_buku',
        'tanggal_pinjam',
        'tanggal_kembali',
        'batas_pengembalian',
        'status',
        'denda',
        'catatan'
    ];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date',
        'tanggal_pengembalian' => 'date',
        'denda' => 'decimal:2'
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

    protected function pengembalian(): BelongsTo {
        return $this->BelongsTo(pengembalian::class, 'peminjaman_id');
    }
}
