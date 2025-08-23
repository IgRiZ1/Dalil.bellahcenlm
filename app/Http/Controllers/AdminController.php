<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    /**
     * Constructor - alleen admins kunnen deze controller gebruiken
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Check of gebruiker admin is
     */
    private function checkAdmin()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina. Alleen beheerders kunnen deze functionaliteit gebruiken.');
        }
    }

    /**
     * Toon admin dashboard
     */
    public function dashboard()
    {
        $this->checkAdmin();
        
        $totalUsers = User::count();
        $totalAdmins = User::where('is_admin', true)->count();
        $recentUsers = User::latest()->take(5)->get();
        
        return view('admin.dashboard', compact('totalUsers', 'totalAdmins', 'recentUsers'));
    }

    /**
     * Toon alle gebruikers
     */
    public function users()
    {
        $this->checkAdmin();
        
        $users = User::latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Toon formulier voor nieuwe gebruiker
     */
    public function createUser()
    {
        $this->checkAdmin();
        
        return view('admin.users.create');
    }

    /**
     * Sla nieuwe gebruiker op
     */
    public function storeUser(Request $request)
    {
        $this->checkAdmin();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()],
            'is_admin' => 'boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin'),
        ]);

        return redirect()->route('admin.users')
            ->with('success', 'Gebruiker succesvol aangemaakt!');
    }

    /**
     * Toon bewerk formulier voor gebruiker
     */
    public function editUser(User $user)
    {
        $this->checkAdmin();
        
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update gebruiker
     */
    public function updateUser(Request $request, User $user)
    {
        $this->checkAdmin();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'is_admin' => 'boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'is_admin' => $request->has('is_admin'),
        ]);

        return redirect()->route('admin.users')
            ->with('success', 'Gebruiker succesvol bijgewerkt!');
    }

    /**
     * Verwijder gebruiker
     */
    public function destroyUser(User $user)
    {
        $this->checkAdmin();

        // Voorkom dat admin zichzelf verwijdert
        if ($user->id === auth()->id()) {
            return back()->with('error', 'U kunt uw eigen account niet verwijderen!');
        }

        $user->delete();

        return redirect()->route('admin.users')
            ->with('success', 'Gebruiker succesvol verwijderd!');
    }

    /**
     * Toggle admin status van gebruiker
     */
    public function toggleAdmin(User $user)
    {
        $this->checkAdmin();

        // Voorkom dat admin zijn eigen admin status verwijdert
        if ($user->id === auth()->id()) {
            return back()->with('error', 'U kunt uw eigen admin status niet wijzigen!');
        }

        $user->update(['is_admin' => !$user->is_admin]);

        $status = $user->is_admin ? 'bevorderd tot admin' : 'afgezet als admin';
        
        return redirect()->route('admin.users')
            ->with('success', "Gebruiker {$user->name} is succesvol {$status}!");
    }
}
