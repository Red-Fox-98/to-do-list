<?php

declare(strict_types=1);

namespace App\Enums;

enum TaskStatusEnum: string
{
    case Done = 'выполнена';
    case NotCompleted = 'не выполнена';
}
