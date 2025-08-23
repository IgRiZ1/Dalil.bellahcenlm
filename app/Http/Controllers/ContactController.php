<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Toon contact formulier
     */
    public function show()
    {
        return view('contact.show');
    }

    /**
     * Verwerk contact formulier
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Sla contact bericht op in database
        $contact = Contact::create($request->all());

        // Stuur email naar admin (voor nu sturen we gewoon een bericht terug)
        // In een echte applicatie zou je hier een Mailable class gebruiken
        // Mail::to('admin@ehb.be')->send(new ContactFormMail($contact));

        return redirect()->route('contact.show')
            ->with('success', 'Uw bericht is succesvol verzonden! We nemen zo spoedig mogelijk contact met u op.');
    }

    /**
     * Toon alle contact berichten (alleen admins)
     */
    public function index()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }
        
        $contacts = Contact::latest()->paginate(20);
        return view('contact.index', compact('contacts'));
    }

    /**
     * Toon specifiek contact bericht (alleen admins)
     */
    public function showMessage(Contact $contact)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }
        
        return view('contact.show-message', compact('contact'));
    }

    /**
     * Verwijder contact bericht (alleen admins)
     */
    public function destroy(Contact $contact)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina.');
        }

        $contact->delete();

        return redirect()->route('contact.index')
            ->with('success', 'Contact bericht succesvol verwijderd!');
    }
}
