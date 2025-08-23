<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    /**
     * Toon alle FAQ categorieën en vragen
     */
    public function index()
    {
        $faqCategories = FaqCategory::with('questions')->get();
        return view('faq.index', compact('faqCategories'));
    }

    /**
     * Toon formulier voor nieuwe FAQ categorie (alleen admins)
     */
    public function createCategory()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }
        
        return view('admin.faq.categories.create');
    }

    /**
     * Sla nieuwe FAQ categorie op (alleen admins)
     */
    public function storeCategory(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        FaqCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('faq.index')
            ->with('success', 'FAQ categorie succesvol aangemaakt!');
    }

    /**
     * Toon bewerk formulier voor FAQ categorie (alleen admins)
     */
    public function editCategory(FaqCategory $faqCategory)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }
        
        return view('admin.faq.categories.edit', compact('faqCategory'));
    }

    /**
     * Update FAQ categorie (alleen admins)
     */
    public function updateCategory(Request $request, FaqCategory $faqCategory)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $faqCategory->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('faq.index')
            ->with('success', 'FAQ categorie succesvol bijgewerkt!');
    }

    /**
     * Verwijder FAQ categorie (alleen admins)
     */
    public function destroyCategory(FaqCategory $faqCategory)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }

        $faqCategory->delete();

        return redirect()->route('faq.index')
            ->with('success', 'FAQ categorie succesvol verwijderd!');
    }

    /**
     * Toon formulier voor nieuwe FAQ vraag (alleen admins)
     */
    public function createQuestion()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }
        
        $faqCategories = FaqCategory::all();
        return view('admin.faq.questions.create', compact('faqCategories'));
    }

    /**
     * Sla nieuwe FAQ vraag op (alleen admins)
     */
    public function storeQuestion(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }

        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:1000',
            'answer' => 'required|string|max:2000',
            'faq_category_id' => 'required|exists:faq_categories,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        FaqQuestion::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'faq_category_id' => $request->faq_category_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('faq.index')
            ->with('success', 'FAQ vraag succesvol toegevoegd!');
    }

    /**
     * Toon bewerk formulier voor FAQ vraag (alleen admins)
     */
    public function editQuestion(FaqQuestion $faqQuestion)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }
        
        $faqCategories = FaqCategory::all();
        return view('admin.faq.questions.edit', compact('faqQuestion', 'faqCategories'));
    }

    /**
     * Update FAQ vraag (alleen admins)
     */
    public function updateQuestion(Request $request, FaqQuestion $faqQuestion)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }

        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:1000',
            'answer' => 'required|string|max:2000',
            'faq_category_id' => 'required|exists:faq_categories,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $faqQuestion->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'faq_category_id' => $request->faq_category_id,
        ]);

        return redirect()->route('faq.index')
            ->with('success', 'FAQ vraag succesvol bijgewerkt!');
    }

    /**
     * Verwijder FAQ vraag (alleen admins)
     */
    public function destroyQuestion(FaqQuestion $faqQuestion)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }

        $faqQuestion->delete();

        return redirect()->route('faq.index')
            ->with('success', 'FAQ vraag succesvol verwijderd!');
    }
}
