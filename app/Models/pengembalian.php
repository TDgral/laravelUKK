<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';

    protected $guarded = [];

    protected $casts = [
        'tanggal_kembali_aktual' => 'date',
    ];

    public function peminjaman(): BelongsTo {
        return $this->BelongsTo(peminjaman::class, 'peminjaman_id');
    }

    public function admin(): BelongsTo {
        return $this->BelongsTo(User::class, 'admin_id');
    }
}
