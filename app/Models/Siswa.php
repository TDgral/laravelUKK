<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_admin',
        'nis',
        'kelas',
        'jurusan',
        'tanggal_lahir',
        'status'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    protected function admin(): BelongsTo {
        return $this->belongsTo(User::class, 'id_admin');
    }

    public function scopoeAktif($query) {
        return $query->where('status', 'aktif');
    }
}
