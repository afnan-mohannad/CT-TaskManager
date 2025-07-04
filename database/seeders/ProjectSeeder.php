<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()
            ->count(10)
            ->create()
            ->each(function ($project) {
                $project->tasks()->saveMany(
                    Task::factory()->count(rand(1, 5))->make()
                );
            });
    }
}
