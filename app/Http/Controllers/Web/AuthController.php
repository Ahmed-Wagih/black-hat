<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\Classes\InterestService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    protected $interestService;

    public function __construct(InterestService  $interestService)
    {
        $this->interestService = $interestService;
    }
    public function loginForm()
    {
        if (Auth::guard('web')->user()) {
            return redirect()->route('web.home');
        }
        return view('web.login');
    }

    public function login(LoginRequest $request)
    {
        Artisan::call("cache:clear");
        $user = User::where('email', $request['email'])->first();
        if (!$user) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Invalid Email Or Password!']);
        }
        if (Auth::guard('web')->attempt($request->only(['email', 'password']), true)) {
            $request->session()->regenerate();
            return redirect()->intended(route('web.home'));
        }

        return redirect()->back()->withErrors(['error' => 'Invalid Email Or Password!']);
    }

    public function registerForm()
    {
        return view('web.register');
    }

    public function register(RegisterRequest $request)
    {
  
        $request['active'] = 'active';
        $user = User::create([
            'full_name' => $request->full_name,
            'user_name' => $request->full_name,
            'position' => $request->position,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'profile_image' => $request->profile_image,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user, true);
        return redirect()->route('web.interests');
    }

    public function interests()
    {
        $interests = $this->interestService->findBy(request());
        return view('web.interests', get_defined_vars());
    }

    public function storeInterests(Request $request)
    {
        $user = auth()->user();
        $interests = [];
        if ($request->interests) {
            foreach ($request->interests as $interest) {
                settype($interest, "integer");
                $interests[] =  $interest; // The variable is now an integer.
            }
            $user->interests()->attach($interests);
        }

        return redirect()->route('web.home');
    }

    public function gender()
    {
        return view('web.gender');
    }

    public function storeGender(Request $request)
    {
        if ($request->gender) {
            $user = auth()->user();
            $user->gender = $request->gender;
            $user->save();
        }

        return redirect()->route('web.age');
    }

    public function age()
    {
        return view('web.age');
    }

    public function storeAge(Request $request)
    {
        if ($request->age) {
            $user = auth()->user();
            $user->age = $request->age;
            $user->save();
        }
        return redirect()->route('web.home');
    }
       public function logout()
    {
        Auth::guard('')->logout();
        return redirect()->route('web.login');
    }
}
