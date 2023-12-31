<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class UserResumeReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'resume_id', 'reviewed_by', 'review'
    ];

    protected $appends = ['reviewer_names'];

    protected $casts = [
        'id' => 'string',
        'resume_id' => 'string',
        'reviewed_by' => 'string'
    ];

    /**
     * Get the reviewer that owns the UserResumeReview
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by', 'id');
    }

    /**
     * Get the resume that owns the UserResumeReview
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function resume(): BelongsTo
    {
        return $this->belongsTo(UserResume::class, 'resume_id', 'id');
    }

    protected function getReviewerNamesAttribute(): string
    {
        return $this->reviewer->name;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid()->toString();
        });
    }
}
