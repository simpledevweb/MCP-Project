<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MentorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'fullname' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'speciality' => $this->faker->randomElement([
                'Laravel',
                'JavaScript',
                'Python',
                'DevOps',
                'SQL',
                'Java',
                'C#',
                'React',
                'Vue',
                'AI Engineering'
            ]),
        ];
    }
}