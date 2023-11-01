<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Agenda;
use App\Models\Category;
use App\Models\Challenge;
use App\Models\ChallengeCategory;
use App\Models\Interest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $this->authorize('view_dashboard');
        $users = User::count();
        $challenges = Challenge::count();
        $roles = Role::count();
        $categories = Category::get();
        $challengecategories = ChallengeCategory::count();
        $admins = Admin::count();
        $interests = Interest::count();
        $agendas = Agenda::count();
        return view('dashboard.index',compact('users','challenges','roles','categories','challengecategories','admins','interests','agendas'));
    }

    public function dashboard()
    {
        $this->authorize('view_dashboard');

        return view('dashboard.dashboard');
    }
}
