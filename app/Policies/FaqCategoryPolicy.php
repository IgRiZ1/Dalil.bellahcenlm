<?php

namespace App\Policies;

use App\Models\FaqCategory;
use App\Models\User;

class FaqCategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Iedereen kan FAQ categorieën bekijken
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, FaqCategory $faqCategory): bool
    {
        return true; // Iedereen kan individuele FAQ categorieën bekijken
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin(); // Alleen admins kunnen FAQ categorieën aanmaken
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, FaqCategory $faqCategory): bool
    {
        return $user->isAdmin(); // Alleen admins kunnen FAQ categorieën bewerken
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FaqCategory $faqCategory): bool
    {
        return $user->isAdmin(); // Alleen admins kunnen FAQ categorieën verwijderen
    }
}
