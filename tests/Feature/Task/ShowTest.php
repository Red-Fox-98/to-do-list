<?php

declare(strict_types=1);

namespace Tests\Feature\Task;

use App\Models\Task;
use Tests\TestCase;

class ShowTest extends TestCase
{
    public function testShowTaskIsSuccessful(): void
    {
        /** @var Task $task */
        $task = Task::all()->random();

        $response = $this->json('GET', "/api/tasks/$task->id");

        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'description',
                'status',
            ],
        ]);
    }
}
