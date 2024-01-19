<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * All attributes coming from the request
     * @var array
     */
    protected $guarded = [];

    /**
     * Associated table to this current model
     *
     * @var string
     */
    protected $table = 'jobs';


    /**
     * One to many reletionship (inverse)
     * 
     * Job belongs to one user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The jobs that belong to the tags.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'jobs_tags', 'job_id', 'tag_id');
    }
}
