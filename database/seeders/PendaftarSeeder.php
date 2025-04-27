<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pendaftar;

class PendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pendaftar::factory(30)->create();
    }
}
