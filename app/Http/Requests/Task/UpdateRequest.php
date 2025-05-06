<?php

declare(strict_types=1);

namespace App\Http\Requests\Task;

use App\Data\Task\UpdateRequestData;
use App\Enums\TaskStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => [ 'string' , 'sometimes' ],
            'description' => [ 'string' , 'sometimes' ],
            'status' => [ 'string', new Enum(TaskStatusEnum::class) , 'sometimes' ],
        ];
    }

    public function getData(): UpdateRequestData
    {
        return UpdateRequestData::from($this->validated());
    }
}
