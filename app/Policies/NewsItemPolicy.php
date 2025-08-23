<?php

namespace App\Policies;

use App\Models\NewsItem;
use App\Models\User;

class NewsItemPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Iedereen kan nieuwsitems bekijken
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, NewsItem $newsItem): bool
    {
        return true; // Iedereen kan individuele nieuwsitems bekijken
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin(); // Alleen admins kunnen nieuwsitems aanmaken
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, NewsItem $newsItem): bool
    {
        return $user->isAdmin(); // Alleen admins kunnen nieuwsitems bewerken
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, NewsItem $newsItem): bool
    {
        return $user->isAdmin(); // Alleen admins kunnen nieuwsitems verwijderen
    }
}
