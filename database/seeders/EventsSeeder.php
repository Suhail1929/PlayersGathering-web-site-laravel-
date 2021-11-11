<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\Events;
use Illuminate\Database\Seeder;
use App\Models\User;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Events::factory()->count(10)->create();
    }
}
