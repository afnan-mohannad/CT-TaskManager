<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'status'];

    public function tasks()
    {
        return $this->hasMany(Task::class)->orderBy('priority');
    }

    public static function getAll()
    {
        return Cache::rememberForever('projects.all', function () {
            return self::Active()->get();
        });
    }

    protected static function boot()
    {
        parent::boot();

        static::updated(function () {
            self::flushCache();
        });

        static::created(function() {
            self::flushCache();
        });

        static::deleted(function() {
            self::flushCache();
        });
    }

    public static function flushCache()
    {
        Cache::forget('projects.all');
    }

    public function scopeActive($query)
    {
        $query->where('status', 1);
    }
}
