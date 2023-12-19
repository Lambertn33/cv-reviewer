<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserResume extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'user_id', 'filename', 'is_open_for_review', 'open_review_description'
    ];

    protected $casts = [
        'id' => 'string',
        'user_id' => 'string'
    ];

    /**
     * Get the user that owns the UserResume
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the reviews for the UserResume
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(UserResumeReview::class, 'resume_id', 'id');
    }
}
