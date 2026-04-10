<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Filament\Models\Contracts\HasName;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;

class User extends Authenticatable implements FilamentUser, HasName
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'nama_lengkap',
        'username',
        'email',
        'password',
        'role',
        'alamat',
        'telepon'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(\Filament\Panel $panel): bool {
        \Log::info('canAccessPanel', [
            'user_id' => $this->id,
            'role' => $this->role,
            'panel' => $panel->getId()
        ]);
    
        return match ($panel->getId()) {
            'admin' => $this->role === 'admin',
            'siswa' => $this->role === 'siswa',
            default => false
        };
    }

    public function getFilamentName(): string {
        return $this->nama_lengkap ?? $this->nama ?? $this->username ?? $this->email ?? 'admin';
    }

    public function siswa() {
        return $this->hasOne(Siswa::class);
    }
}
