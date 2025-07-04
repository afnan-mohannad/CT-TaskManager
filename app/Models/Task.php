<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = ['title', 'priority', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public static function getByProjectId($projectId)
    {
        return self::where('project_id', $projectId)->orderBy('priority')->get();
    }

    public static function createNew($title, $projectId, $priority)
    {
        return self::create([
            'title' => $title,
            'project_id' => $projectId,
            'priority' => $priority,
        ]);
    }

    public static function getPriority($projectId)
    {
        return self::where('project_id', $projectId)->max('priority') + 1;
    }
    
}

