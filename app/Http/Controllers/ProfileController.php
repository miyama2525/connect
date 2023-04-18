<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Emergency;
use App\Models\EmergencyRead;
use App\Models\Child;
use App\Models\Guardian;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function dashboard(Request $request){
        $user = Auth::user();
        
        $emergency_reads = EmergencyRead::where('user_id', $user->id)
        ->where('read', false)
        ->first();

        $empty_children = Child::where('user_id', $user->id)
        ->first();

        $empty_guardians = Guardian::where('user_id', $user->id)
        ->first();

        return view('dashboard', [
            'emergency_reads' => $emergency_reads,
            'empty_children' => $empty_children,
            'empty_guardians' => $empty_guardians,
        ]);

    }
}
