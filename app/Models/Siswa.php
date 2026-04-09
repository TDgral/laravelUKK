<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'user_id',
        'nis',
        'kelas',
        'jurusan',
        'tanggal_lahir',
        'status'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    protected function user(): BelongsTo {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function scopoeAktif($query) {
        return $query->where('status', 'aktif');
    }
}
