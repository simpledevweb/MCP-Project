<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\Student;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Task;

class LMSSeeder extends Seeder
{
    public function run(): void
    {
        // COURSES (10)
        $courses = Course::factory()->count(10)->create();

        // MENTORS (10)
        $mentors = Mentor::factory()->count(10)->create();

        // STUDENTS (10)
        $students = Student::factory()->count(10)->create();

        // GROUPS (10)
        $groups = collect();
        for ($i = 0; $i < 10; $i++) {
            $groups->push(
                Group::create([
                    'course_id' => $courses->random()->id,
                    'mentor_id' => $mentors->random()->id,
                    'title' => 'Group ' . chr(65 + $i),
                    'start_date' => now()->subDays(rand(1, 60)),
                    'end_date' => now()->addDays(rand(30, 120)),
                ])
            );
        }

        // GROUP → STUDENTS (random 5–12 students)
        foreach ($groups as $group) {
            $group->students()->attach(
                $students->random(rand(5, 10))->pluck('id')->toArray()
            );
        }

        // LESSONS (10)
        $lessons = collect();
        for ($i = 1; $i <= 10; $i++) {
            $lessons->push(
                Lesson::create([
                    'course_id' => $courses->random()->id,
                    'title' => "Lesson $i",
                    'content' => "Content for lesson $i",
                ])
            );
        }

        // TASKS (10) — coding masalalar
        for ($i = 1; $i <= 10; $i++) {
            Task::create([
                'lesson_id' => $lessons->random()->id,
                'title' => "Coding Task $i",
                'description' => "Solve coding task number $i",
                'starter_code' => "<?php\n// Solve task $i\n",
                'test_cases' => [
                    ['input' => [1, 2], 'output' => 3],
                    ['input' => [5, 7], 'output' => 12],
                ],
            ]);
        }
    }
}