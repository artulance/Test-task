<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

//php artisan make:model Status
class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    public function tasks() : HasMany
    {
        return $this->hasMany(Task::class);
    }
}
