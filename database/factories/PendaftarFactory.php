<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PendaftarFactory extends Factory
{
    public function definition(): array
    {
        $status = ['terdaftar', 'hadir', 'tidak hadir'];

        return [
            'nama_lengkap' => $this->faker->name(),
            'nik' => $this->faker->unique()->numerify('################'),
            'tanggal_lahir' => $this->faker->date('Y-m-d', '2005-01-01'),
            'jenis_vaksin' => $this->faker->randomElement(['Sinovac', 'Pfizer', 'Moderna', 'AstraZeneca']),
            'lokasi_vaksin' => $this->faker->city(),
            'tanggal_vaksin' => $this->faker->dateTimeBetween('-1 years', '+6 months')->format('Y-m-d'),
            'status' => $this->faker->randomElement($status),
        ];
    }
}
