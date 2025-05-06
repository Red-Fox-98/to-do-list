<?php

declare(strict_types=1);

namespace App\Services\Task;

use App\Data\Task\CreateRequestData;
use App\Data\Task\IndexRequestData;
use App\Data\Task\UpdateRequestData;
use App\Models\Task;
use Illuminate\Support\Collection;

class TaskService
{
    final public function create(CreateRequestData $request): Task
    {
        return Task::query()->create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
            ]
        );
    }

    final public function index(): Collection
    {
        return Task::all();
    }

    final public function show(int $id): ?Task
    {
        /** @var Task $task */
        $task = Task::query()->findOrFail($id);

        return $task;
    }

    final public function update(int $id, UpdateRequestData $request): ?Task
    {
        /** @var Task $task */
        $task = Task::query()->find($id);

        $task->update([
            'title' => $request->title ?: $task['title'],
            'description' => $request->description ?: $task['description'],
            'status' => $request->status ?: $task['status'],
        ]);

        return $task;
    }

    final public function delete(int $id): void
    {
        Task::query()->find($id)->delete();
    }
}
