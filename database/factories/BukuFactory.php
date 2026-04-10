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
            'penulis' => fake()->name(),
            'penerbit' => fake()->company(),
            'tahun_terbit' => fake()->date(),
            'kategori' => fake()->numberBetween(1, 7),
            'isbn' => fake()->isbn13(),
            'jumlah_halaman' => fake()->numberBetween(80, 500),
            'deskripsi' => fake()->paragraph(),
            'stok' => fake()->numberBetween(1, 50),
            'lokasi_rak' => 'R-' . fake()->randomLetter() . fake()->numberBetween(1, 20),
            'cover_image' => 'https://dummyimage.com/400x300/cccccc/000000&text=Cover',
        ];
    }
}
