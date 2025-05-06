<?php

declare(strict_types=1);

namespace Tests\Feature\Task;

use App\Models\Task;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use WithFaker;

    public function testUpdateTaskIsSuccessful(): void
    {
        $taskId = Task::all()->random();
        $task = [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['выполнена', 'не выполнена']),
        ];

        $response = $this->json('PUT', "/api/tasks/$taskId->id", $task);

        $response->assertStatus(200)->assertJsonStructure(['message']);
    }
}
