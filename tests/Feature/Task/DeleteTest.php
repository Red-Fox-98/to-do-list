<?php

declare(strict_types=1);

namespace Tests\Feature\Task;

use App\Models\Task;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    public function testDeleteTaskIsSuccessful(): void
    {
        /** @var Task $task */
        $task = Task::all()->random();

        $response = $this->json('DELETE', "/api/tasks/$task->id");

        $response->assertStatus(200)->assertJsonStructure(['message']);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
