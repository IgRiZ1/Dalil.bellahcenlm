<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FaqQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'faq_category_id',
        'user_id',
    ];

    /**
     * Get the category this question belongs to
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(FaqCategory::class, 'faq_category_id');
    }

    /**
     * Get the user that created this question
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get users who have liked this question (Many-to-Many relationship)
     */
    public function likedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_faq_question_likes')
                    ->withTimestamps();
    }
}
