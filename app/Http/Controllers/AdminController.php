<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
public function sendResetLink(Request $request)
{
    $request->validate(['email' => 'required|email|exists:admins,email']);

    $admin = Admin::where('email', $request->email)->first();

    $token = Str::random(60);

    // ✅ Now works!
    DB::table('admin_password_resets')->updateOrInsert(
        ['email' => $admin->email],
        [
            'email' => $admin->email,
            'token' => Hash::make($token),
            'created_at' => now()
        ]
    );

    $resetLink = route('admin.reset.password', $token) . '?email=' . urlencode($admin->email);

    return back()->with('status', "Reset link: <a href='$resetLink' class='text-blue-600 underline'>Click here to reset password</a>");
}
public function resetPassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email|exists:admins,email',
        'password' => 'required|min:6|confirmed',
    ]);

    $reset = DB::table('admin_password_resets')->where('email', $request->email)->first();

    if (!$reset) {
        return back()->withErrors(['email' => 'Invalid or expired link.']);
    }

    if (!Hash::check($request->token, $reset->token)) {
        return back()->withErrors(['token' => 'Invalid token.']);
    }

    $admin = Admin::where('email', $request->email)->first();
    $admin->password = Hash::make($request->password);
    $admin->save();

    DB::table('admin_password_resets')->where('email', $request->email)->delete();

    return redirect()->route('admin.login')->with('success', 'Password reset! You can now log in.');
}
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function createAdmin()
    {
        $admin = Admin::where('email', 'admin@example.com')->first();

        if ($admin) {
            return "Admin already exists!";
        }

        Admin::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        return "Admin created successfully!";
    }
}
