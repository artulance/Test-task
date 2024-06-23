<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//php artisan make:model Task
class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'name',
        'description',
        'group_task_id',
        'user_id',
        'iteration',
        'periodicity_id',
        'status',
        'start_date',
        'due_date',
    ];

    public function groupTask(): BelongsTo
    {
        return $this->belongsTo(GroupTask::class);
    }

    public function periodicity(): BelongsTo
    {
        return $this->belongsTo(Periodicity::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function currentStatus(): BelongsTo
    {
        return $this->belongsTo(Status::class,"status");
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
    
        return $data;
    }
}
