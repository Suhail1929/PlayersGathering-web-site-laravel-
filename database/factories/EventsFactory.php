<?php

namespace Database\Factories;

use App\Models\Events;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
class EventsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Events::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $usersID = DB::table('users')->pluck('id'); 
        return [ 'title' => $this->faker->realText($maxNbChars = 20, $indexSize = 2), 
        'message' => $this->faker->realText($maxNbChars = 200, $indexSize = 2), 
        'date' => $this->faker->dateTimeBetween($startDate = '-1 years'), 
        'user_id' => $this->faker->randomElement($usersID),
        'NumP'=>$this->faker->randomElement($usersID)
         ];

      
    }
}
