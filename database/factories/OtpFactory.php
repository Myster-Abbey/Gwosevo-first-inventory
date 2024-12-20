<?php

namespace Database\Factories;

use App\Models\Otp;
use Illuminate\Database\Eloquent\Factories\Factory;

class OtpFactory extends Factory
{
    public function definition()
    {
        return [
            'otp' => $this->generateRandomOtp(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    private function generateRandomOtp()
    {
        $characters = '1234567890';
        $randomOtp = '';
        for ($i = 0; $i < 4; $i++) {
            $randomOtp .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomOtp;
    }
}
