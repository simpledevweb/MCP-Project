<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement([
                'Backend Development',
                'Frontend Basics',
                'Python Bootcamp',
                'Mobile Development',
                'DevOps Essentials',
                'Data Structures',
                'Algorithms Pro',
                'AI Engineering',
                'SQL Mastery',
                'React Advanced'
            ]),
            'description' => $this->faker->paragraph(),
            'level' => $this->faker->randomElement(['beginner', 'middle', 'advanced']),
        ];
    }
}