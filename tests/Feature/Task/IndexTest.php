<?php

declare(strict_types=1);

namespace Tests\Feature\Task;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use WithFaker;

    public function testIndexTaskIsSuccessful(): void
    {
        $response = $this->json('GET','/api/tasks',
        );

        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'description',
                    'status'],
            ],
        ]);
    }
}
