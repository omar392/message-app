<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title_ar'=>$this->faker->word,
            'title_en'=>$this->faker->word,
            'message_ar'=>$this->faker->text,
            'message_en'=>$this->faker->text,
            'user_id'=>$this->faker->randomElement(User::pluck('id')->toArray()),
            'status'=>$this->faker->randomElement(['active','inactive']),
        ];
    }
}
