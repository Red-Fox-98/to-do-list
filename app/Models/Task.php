<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $status
 */

class Task extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'title',
        'description',
        'status',
    ];
}
