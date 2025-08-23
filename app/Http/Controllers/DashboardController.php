<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use App\Models\FaqCategory;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Toon gebruikers dashboard
     */
    public function index()
    {
        $user = Auth::user();
        
        // Haal recente nieuwsitems op
        $recentNews = NewsItem::latest()->take(5)->get();
        
        // Haal FAQ categorieën op
        $faqCategories = FaqCategory::with('questions')->take(3)->get();
        
        // Als gebruiker admin is, toon extra statistieken
        $isAdmin = $user->isAdmin();
        $adminStats = null;
        
        if ($isAdmin) {
            $adminStats = [
                'totalUsers' => \App\Models\User::count(),
                'totalNews' => NewsItem::count(),
                'totalContacts' => Contact::count(),
                'recentContacts' => Contact::latest()->take(5)->get(),
            ];
        }
        
        return view('dashboard.index', compact('user', 'recentNews', 'faqCategories', 'isAdmin', 'adminStats'));
    }

    /**
     * Toon gebruikers profiel
     */
    public function profile()
    {
        $user = Auth::user();
        $newsItems = $user->newsItems()->latest()->take(10)->get();
        
        return view('dashboard.profile', compact('user', 'newsItems'));
    }

    /**
     * Toon gebruikers instellingen
     */
    public function settings()
    {
        $user = Auth::user();
        return view('dashboard.settings', compact('user'));
    }
}
