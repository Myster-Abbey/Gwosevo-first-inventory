<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CodeFactory extends Factory
{
    public function definition()
    {
        return [
            'code' => $this->generateRandomCode(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    private function generateRandomCode()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomCode = '';
        for ($i = 0; $i < 5; $i++) {
            $randomCode .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomCode;
    }
}
