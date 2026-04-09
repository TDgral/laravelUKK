<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstname = fake()->firstName();
        $lastname = fake()->lastname();

        $fullname = $firstname . ' ' . $lastname;

        return [
            'nama' => $firstname,
            'nama_lengkap' => $fullname,
            'username' => Str::lower(Str::slug($firstname . '.' . $lastname)) . fake()->unique()->numerify('######'),
            'email' => Str::lower(Str::slug($firstname . '.' . $lastname)) . fake()->numerify('#####') . '@example.com',
            'email_verified_at' => now(),
            'telepon' => fake()->unique()->numerify('08##########'),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => Arr::random(['admin', 'siswa', 'keluar']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => now(),
        ]);
    }

    public function admin(): static {
        return $this->state(fn () => ['role' => 'admin']);
    }

    public function siswa(): static {
        return $this->state(fn () => ['role' => 'siswa']);
    }
}
