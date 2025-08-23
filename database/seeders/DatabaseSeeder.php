<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\NewsItem;
use App\Models\FaqCategory;
use App\Models\FaqQuestion;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Maak default admin gebruiker
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'is_admin' => true,
        ]);

        // Maak een gewone gebruiker
        User::create([
            'name' => 'Test Gebruiker',
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        // Maak voorbeeld nieuwsitems
        NewsItem::create([
            'title' => 'Welkom op onze website!',
            'content' => 'Dit is ons eerste nieuwsbericht. We zijn verheugd om u te verwelkomen op onze nieuwe website.',
            'published_at' => now(),
            'user_id' => 1,
        ]);

        // Maak voorbeeld FAQ categorieën en vragen
        $faqCategory = FaqCategory::create([
            'name' => 'Algemene Vragen',
            'description' => 'Veelgestelde vragen over onze diensten',
            'user_id' => 1,
        ]);

        FaqQuestion::create([
            'question' => 'Hoe kan ik contact opnemen?',
            'answer' => 'U kunt contact met ons opnemen via het contactformulier op onze website.',
            'faq_category_id' => $faqCategory->id,
            'user_id' => 1,
        ]);

        FaqQuestion::create([
            'question' => 'Wat zijn uw openingstijden?',
            'answer' => 'We zijn geopend van maandag tot vrijdag van 9:00 tot 17:00.',
            'faq_category_id' => $faqCategory->id,
            'user_id' => 1,
        ]);
    }
}
