<?php

namespace Database\Seeders;

use App\Models\Otp;
use Illuminate\Database\Seeder;

class OtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Otp::factory()->count(10)->create();
    }
}
