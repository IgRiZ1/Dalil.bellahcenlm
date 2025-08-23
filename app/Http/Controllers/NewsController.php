<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Toon alle nieuwsitems
     */
    public function index()
    {
        $newsItems = NewsItem::with('user')
            ->published()
            ->latest('published_at')
            ->paginate(10);

        return view('news.index', compact('newsItems'));
    }

    /**
     * Toon een specifiek nieuwsitem
     */
    public function show(NewsItem $newsItem)
    {
        return view('news.show', compact('newsItem'));
    }

    /**
     * Toon formulier voor nieuw nieuwsitem (alleen admins)
     */
    public function create()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }
        
        return view('news.create');
    }

    /**
     * Sla nieuw nieuwsitem op (alleen admins)
     */
    public function store(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['title', 'content', 'published_at']);
        $data['user_id'] = Auth::id();

        // Verwerk afbeelding upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news-images', 'public');
            $data['image'] = $path;
        }

        // Als geen publicatiedatum is opgegeven, gebruik huidige tijd
        if (empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        NewsItem::create($data);

        return redirect()->route('news.index')
            ->with('success', 'Nieuwsitem succesvol aangemaakt!');
    }

    /**
     * Toon bewerk formulier (alleen admins)
     */
    public function edit(NewsItem $newsItem)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }
        
        return view('news.edit', compact('newsItem'));
    }

    /**
     * Update nieuwsitem (alleen admins)
     */
    public function update(Request $request, NewsItem $newsItem)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['title', 'content', 'published_at']);

        // Verwerk afbeelding upload
        if ($request->hasFile('image')) {
            // Verwijder oude afbeelding als die bestaat
            if ($newsItem->image) {
                Storage::disk('public')->delete($newsItem->image);
            }

            $path = $request->file('image')->store('news-images', 'public');
            $data['image'] = $path;
        }

        $newsItem->update($data);

        return redirect()->route('news.show', $newsItem)
            ->with('success', 'Nieuwsitem succesvol bijgewerkt!');
    }

    /**
     * Verwijder nieuwsitem (alleen admins)
     */
    public function destroy(NewsItem $newsItem)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }

        // Verwijder afbeelding als die bestaat
        if ($newsItem->image) {
            Storage::disk('public')->delete($newsItem->image);
        }

        $newsItem->delete();

        return redirect()->route('news.index')
            ->with('success', 'Nieuwsitem succesvol verwijderd!');
    }
}
