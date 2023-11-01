<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Mail\UserResetPasswordMail;
use App\Models\Admin;
use App\Models\Scopes\TenantScope;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (Auth::guard('admins')->user()) {
            return redirect()->route('index');
        }
        return view('dashboard.auth.login');
    }

    public function login(LoginRequest $request)
    {
        Artisan::call("cache:clear");
        $admin = Admin::where('email', $request['email'])->first();
        if (!$admin) {
            return redirect()->back()->withInput()->with(['error' => 'Invalid Email Or Password!']);
        }

        if (Auth::guard('admins')->attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();
            return redirect()->route('index');
        }

        return redirect()->back()->withErrors(['error' => 'Invalid Email Or Password!']);
    }

    public function getResetPassword()
    {
        return view('dashboard.auth.reset-password');
    }

    public function postResetPassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::guard('admins')->user()->password))) {
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        $request->validate([
            'current-password' => ['required', 'string', 'min:8', 'max:255'],
            'new-password' => 'required|string|min:6|confirmed:new-password_confirmation',
        ]);

        $user = Auth::guard('admins')->user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with(['message' => 'Password changed successfully ']);
    }

    public function checkResetCode(Request $request)
    {
        $checkResetCode = DB::table('password_reset_tokens')->where('token', $request['code'])->first();

        if (!$checkResetCode) {
            return view('dashboard.auth.reset-password')->with(['error' => 'Reset Code is Invalid']);
        }

        // Check Reset Code Expiration
        $currentDate = Carbon::parse(date('Y-m-d h:i:s'));
        $expirationDate = Carbon::parse($checkResetCode->expiration_date);
        $diff = $currentDate->diffInHours($expirationDate);

        if ($diff >= 8) {
            return view('dashboard.auth.reset-password')->with(['error' => 'Reset Code is Expired']);
        }

        return view('dashboard.auth.new-password')->with(['code' => $checkResetCode->token]);
    }

    public function changePassword(Request $request)
    {
        $checkCode = DB::table('password_reset_tokens')->where('token', $request['code'])->first();
        $admin = User::where('email', $checkCode->email)->first();

        // Check New Password and Confirm Password
        if ($request['new_password'] != $request['confirm_password']) {
            return redirect()->back()->with(['error' => 'New Password Does Not Match Confirm Password']);
        }

        $admin->update(['password' => Hash::make($request['new_password'])]);

        return redirect()->route('postLogin');
    }

    public function logout()
    {
        Auth::guard('')->logout();
        return redirect()->route('admin.login');
    }
}
