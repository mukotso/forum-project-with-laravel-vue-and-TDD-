<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChannelFactory extends Factory
{

    protected $model =Channel::class;

    public function definition()
    {
        $name=$this->faker->word;
        return [
            'name'=>$name,
            'slug'=>$name
        ];
    }
}
