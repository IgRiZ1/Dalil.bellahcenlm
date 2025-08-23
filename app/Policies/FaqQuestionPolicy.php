<?php

namespace App\Policies;

use App\Models\FaqQuestion;
use App\Models\User;

class FaqQuestionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Iedereen kan FAQ vragen bekijken
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, FaqQuestion $faqQuestion): bool
    {
        return true; // Iedereen kan individuele FAQ vragen bekijken
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin(); // Alleen admins kunnen FAQ vragen aanmaken
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, FaqQuestion $faqQuestion): bool
    {
        return $user->isAdmin(); // Alleen admins kunnen FAQ vragen bewerken
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FaqQuestion $faqQuestion): bool
    {
        return $user->isAdmin(); // Alleen admins kunnen FAQ vragen verwijderen
    }
}
