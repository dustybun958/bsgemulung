<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Exception;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        try {
            // Validasi data input
            $validated = $request->validateWithBag('updatePassword', [
                'current_password' => ['required', 'current_password'],
                'password' => ['required', Password::defaults(), 'confirmed'],
            ]);

            // Update password user
            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('dashboard')
                ->with('success', 'Password berhasil diperbarui.');
        } catch (Exception $e) {
            // Jika terjadi kesalahan, redirect dengan pesan error
            return back()->withErrors([
                'updatePassword' => 'Gagal memperbarui password. Silakan coba lagi.',
            ])->withInput();
        }
    }
}
