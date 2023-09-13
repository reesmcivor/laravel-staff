<?php

namespace ReesMcIvor\Staff\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use ReesMcIvor\Labels\Models\Label;
use ReesMcIvor\Labels\Models\Staff;

class StaffFactory extends Factory
{

    protected $model = Staff::class;

    public function definition() : array
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
