<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * Associated table to this current model
     */
    protected $table = 'tags';

    /**
     * The tags that belong to the job.
     */
    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'jobs_tags', 'job_id', 'tag_id');
    }
}
