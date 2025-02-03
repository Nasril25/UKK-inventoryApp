<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the admin's profile.
     */
    public function show()
    {
        return view('admin.profile.show');
    }

    /**
     * Display the user's profile.
     */
    public function userShow()
    {
        return view('user.profile.show');
    }

    /**
     * Show the form for editing the admin's profile.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile.edit', [
            'admin' => $request->user(),
        ]);
    }

    /**
     * Show the form for editing the user's profile.
     */
    public function userEdit(Request $request): View
    {
        return view('user.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the admin's profile.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'current_password' => 'nullable|required_with:password|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect']);
            }
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.profile.show')->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile.
     */
    public function userUpdate(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . auth()->id(),
            'current_password' => 'nullable|required_with:password|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    
        $user = auth()->user();
    
        // Hanya update jika diisi
        if ($request->filled('name')) {
            $user->name = $request->name;
        }
    
        if ($request->filled('email')) {
            $user->email = $request->email;
        }
    
        // Update password jika ingin mengganti
        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect']);
            }
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return redirect()->route('user.profile.show')->with('status', 'profile-updated');
    }
    
    /**
     * Update the admin's password.
     */
    public function updateAdminPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('status', 'password-updated');
    }

    /**
     * Update the user's password.
     */
    public function updateUserPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('status', 'password-updated');
    }

    /**
     * Delete the admin's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Delete the user's account.
     */
    public function userDestroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
