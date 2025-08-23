<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FaqCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    /**
     * Get the questions for this category
     */
    public function questions(): HasMany
    {
        return $this->hasMany(FaqQuestion::class);
    }

    /**
     * Get the user that created this category
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
