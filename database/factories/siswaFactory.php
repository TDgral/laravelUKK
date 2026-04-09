<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends Factory<siswa>
 */
class SiswaFactory extends Factory
{
    protected $model = Siswa::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => fake()->unique()->numerify('######'),
            'kelas' => 12,
            'jurusan' => fake()->word(),
            'tanggal_lahir' => fake()->date(),
            'status' => Arr::random(['aktif', 'lulus', 'keluar'])
        ];
    }

    public function aktif(): static {
        return $this->state(fn () => ['status' => 'aktif']);
    }
}
