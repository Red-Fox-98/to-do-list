<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Task\CreateRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Services\Task\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TaskController extends Controller
{
    public function __construct(private readonly TaskService $taskService)
    {
    }

    public function create(CreateRequest $request): JsonResponse
    {
        $task = $this->taskService->create($request->getData());

        return response()->json([
            'id' => $task->id,
            'message' => 'Task created successfully',
        ]);
    }

    public function index(): ResourceCollection
    {
        $tasks = $this->taskService->index();

        return new TaskCollection($tasks);
    }

    public function show(int $id): TaskResource
    {
        $task = $this->taskService->show($id);

        return new TaskResource($task);
    }

    public function update(int $id, UpdateRequest $request): JsonResponse
    {
        $task = $this->taskService->update($id, $request->getData());
        if (!$task) {
            return response()->error('Task not found', 404);
        }

        return response()->json(['message' => 'Task updated successfully']);
    }

    public function delete(int $id): JsonResponse
    {
        $this->taskService->delete($id);

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
