<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsUpdateRequest;
use App\Services\CurlNode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class SettingsController extends Controller
{
    /**
     * Display the user's settings form.
     */
    public function edit(Request $request): View
    {
        return view('settings.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's settings information.
     */
    public function update(SettingsUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if($request->signature_settings) {
            $response = CurlNode::post('/register', [
                'email' => $request->email, 
                'name' => $request->name,
            ]);
            if(!session('connect_error')) {
                // $request->merge(['signature'=>$response->address]);
                $request->user()->signature = $response->address;
            } else {
                $e = ValidationException::withMessages(["signature"=>session('connect_error_message')]);
                $e->redirectTo = '/settings';
                throw $e;
            }
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        if($request->privacy_settings ?? false) {
            return Redirect::route('settings.edit')->with('privacy_update_status', 'privacy-updated');
        } 
        if($request->signature_settings ?? false) {
            return Redirect::route('settings.edit')->with(['signature_create_status'=>'signature-created', 'key'=>$response->key]);
        }   
        return Redirect::route('settings.edit'); 
    }

    /**
     * Delete the user's account.
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
}
