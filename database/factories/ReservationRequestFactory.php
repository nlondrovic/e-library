<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReservationRequest>
 */
class ReservationRequestFactory extends Factory
{
    public function definition()
    {
        return [
            'book_id' => rand(1, 29),
            'student_id' => rand(6, 20),
            'start_time' => now()
        ];
    }
}
