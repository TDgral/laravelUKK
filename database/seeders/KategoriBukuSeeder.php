<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriBuku;

class KategoriBukuSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Fiksi', 'deskripsi' => 'Novel dan cerita fiksi'],
            ['nama_kategori' => 'Non Fiksi', 'deskripsi' => 'Buku non fiksi umum'],
            ['nama_kategori' => 'Teknologi', 'deskripsi' => 'Buku tentang teknologi dan IT'],
            ['nama_kategori' => 'Sejarah', 'deskripsi' => 'Buku sejarah dan biografi'],
            ['nama_kategori' => 'Pendidikan', 'deskripsi' => 'Buku pelajaran dan pendidikan'],
            ['nama_kategori' => 'Komik', 'deskripsi' => 'Komik dan graphic novel'],
            ['nama_kategori' => 'Bisnis', 'deskripsi' => 'Buku bisnis dan manajemen'],
            ['nama_kategori' => 'Agama', 'deskripsi' => 'Buku keagamaan'],
        ];

        foreach ($data as $item) {
            KategoriBuku::firstOrCreate(
                ['nama_kategori' => $item['nama_kategori']],
                ['deskripsi' => $item['deskripsi']]
            );
        }
    }
}
