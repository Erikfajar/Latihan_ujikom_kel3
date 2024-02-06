<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();

        User::create([
            'username' => 'admin1',
            'password' => bcrypt('12345'),
            'email' => 'admin1@gmail.com',
            'nama_lengkap' => 'admin_satu',
            'alamat' => 'Subang',
            'role' => 'administrator',
            'verifikasi' => 'sudah'
        ]);
        User::create([
            'username' => 'petugas1',
            'password' => bcrypt('12345'),
            'email' => 'petugas1@gmail.com',
            'nama_lengkap' => 'petugas_satu',
            'alamat' => 'Subang',
            'role' => 'petugas',
            'verifikasi' => 'sudah'
        ]);
        User::create([
            'username' => 'peminjamn1',
            'password' => bcrypt('12345'),
            'email' => 'peminjam1@gmail.com',
            'nama_lengkap' => 'peminjam_satu',
            'alamat' => 'Subang',
            'role' => 'peminjam',
            'verifikasi' => 'sudah'
        ]);
    }
}
