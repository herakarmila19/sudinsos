<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        // Panggil UseSeeder untuk admin pertama
        $this->call('UserSeeder');
        
        // Panggil MenuSeeder untuk halaman profil dsb
        $this->call('MenuSeeder');
    }
}
