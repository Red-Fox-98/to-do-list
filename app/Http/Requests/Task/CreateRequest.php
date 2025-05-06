<?php

declare(strict_types=1);

namespace App\Http\Requests\Task;

use App\Data\Task\CreateRequestData;
use App\Enums\TaskStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => [ 'required', 'string' ],
            'description' => [ 'string' ],
            'status' => [ 'string', new Enum(TaskStatusEnum::class) ],
        ];
    }

    public function getData(): CreateRequestData
    {
        return CreateRequestData::from($this->validated());
    }
}
