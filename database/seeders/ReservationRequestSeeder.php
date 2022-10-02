<?php

namespace Database\Seeders;

use App\Models\ReservationRequest;
use Illuminate\Database\Seeder;

class ReservationRequestSeeder extends Seeder
{
    public function run()
    {
        ReservationRequest::factory(15)->create();
    }
}
