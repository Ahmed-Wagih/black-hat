<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\ChallengeCategory;
use App\Models\ChallengeUser;
use App\Models\Interest;
use Illuminate\Http\Request;
use App\Services\Classes\ChallengeCategoryService;
use App\Services\Classes\ChallengeService;
use Illuminate\Support\Facades\DB;

class ChallengeController extends Controller
{
    protected $challengeService;
    protected $challengeCategoryService;

    public function __construct(ChallengeService  $challengeService, ChallengeCategoryService $challengeCategoryService)
    {
        $this->challengeService = $challengeService;
        $this->challengeCategoryService = $challengeCategoryService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $challengesQuery = Challenge::query();
        if ($request->has('category_id') && $request->category_id !== null) {
            $challengesQuery = $challengesQuery->where('challenge_category_id', $request->category_id);
        }
        $challenges = $challengesQuery->get();
        $challengecategories = ChallengeCategory::get();
        return view(checkView('web.challenges'), get_defined_vars());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $challenge = $this->challengeService->show($id);
        return view(checkView('web.challenge'), get_defined_vars());
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function scan($id)
    {
        $challenge = $this->challengeService->show($id);
        $user = auth()->user();
        $latestRecord = ChallengeUser::where('challenge_id', $id)->where('user_id', $user->id)->latest()->first();
        if ($latestRecord && $latestRecord->created_at->diffInMinutes() < 15) {
            $message = __('You have participated in this challenge previously');
            $alertType = 'warning ';
            return redirect()->route('web.profile')->with(['message' => $message, 'alertType' => $alertType]);
        }

        $user->experience_points = $user->experience_points + 100;
        if ($challenge->type == 'fmp') {
            $user->health_bar = $user->health_bar + 100;
            $user->mena_bar = $user->mena_bar + 100;
        } else {
            $user->health_bar = $user->health_bar - 100;
            $user->mena_bar = $user->mena_bar - 100;
            if ($user->health_bar <= 0) {
                if ($user->lifes >= 1) {
                    $user->lifes = $user->lifes - 1;
                }
            }
        }
        $user->challenges()->attach($id);
        $user->save();

        $message = __('Challenge points have been added successfully.');
        $alertType = 'success ';
        return redirect()->route('web.profile')->with(['message' => $message, 'alertType' => $alertType]);
    }

    public function search(Request $request)
    {
        if ($request->search) {
            $challenges = Challenge::where('name_ar', 'like', '%' . $request->search . '%')->orWhere('name_en', 'like', '%' . $request->search . '%')->orWhere('description_ar', 'like', '%' . $request->search . '%')->orWhere('description_en', 'like', '%' . $request->search . '%')->get();
            return view('web.compoonents.home_search_result', get_defined_vars());
        }
    }
}
