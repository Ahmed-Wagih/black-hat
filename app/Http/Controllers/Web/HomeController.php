<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Challenge;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $topUsers = User::orderBy('experience_points', 'desc')->take(3)->get();

        $firstUser = $topUsers->first();
        $secondUser = $topUsers->skip(1)->first();
        $thirdUser = $topUsers->skip(2)->first();
        return view('web.home', compact('firstUser', 'secondUser', 'thirdUser'));
    }


    public function statics()
    {
        return view('web.statics');
    }

    public function search(Request $request)
    {
        if ($request->search) {
            $challenges = Challenge::where('name_ar', 'like', '%' . $request->search . '%')->orWhere('name_en', 'like', '%' . $request->search . '%')->orWhere('description_ar', 'like', '%' . $request->search . '%')->orWhere('description_en', 'like', '%' . $request->search . '%')->get();
            $agendas = Agenda::where('name_ar', 'like', '%' . $request->search . '%')->orWhere('name_en', 'like', '%' . $request->search . '%')->orWhere('description_ar', 'like', '%' . $request->search . '%')->orWhere('description_en', 'like', '%' . $request->search . '%')->get();
            return view('web.compoonents.home_search_result', get_defined_vars());
        }
    }
}
