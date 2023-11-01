<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;
class ProfileController extends Controller
{
    public function profile()
    {
        $currentPoints = auth()->user()->experience_points;
        $rank = DB::selectOne("SELECT COUNT(*) as rank FROM users WHERE experience_points > ?", [$currentPoints])->rank + 1;
        return view('web.profile', get_defined_vars());
    }

    public function editProfile()  {
        $id = auth()->user()->id;
        $user = User::findOrfail($id);
        return view('web.editprofile',compact('user'));
    }

    public function updateProfile(UpdateProfileRequest  $request)
    {
        $id = auth()->user()->id;
        $user = User::findOrfail($id);
        $data= $request->validated();

        $data['password'] =Hash::make($request['password']);
        $user->update($data);

        return redirect()->route('web.profile');

    }
}
