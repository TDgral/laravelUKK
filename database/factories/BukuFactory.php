<?php

namespace Database\Factories;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_buku' => 'BK-' . fake()->unique()->numerify('####'),
            'judul' => fake()->sentence(3),
            'penulis',
            'penerbit',
            'kategori',
            'isbn',
            'jumlah_halaman',
            'deskripsi',
            'stok',
            'lokasi_rak',
            'cover_image'
        ];
    }
}
