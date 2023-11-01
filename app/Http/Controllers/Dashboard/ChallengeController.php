<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Http\Requests\ChallengeRequest;
use App\Models\Challenge;
use App\Services\Classes\ChallengeCategoryService;
use App\Services\Classes\ChallengeService;
use Illuminate\Http\Request;

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


        $this->authorize('view_challenges');

        // $challengesQuery = $this->challengeService->findBy($request);

        $challenges  =  Challenge::with('challengecategory')->OrderBy('id')->paginate();
        return view(checkView('dashboard.challenges.index'), compact('challenges'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_challenges');

        $challengecategories = $this->challengeCategoryService->findBy(request());

        return view(checkView('dashboard.challenges.create'), compact('challengecategories'));
    }

    /**
     * @param challengeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ChallengeRequest $request)
    {
        $this->authorize('create_challenges');

        $this->challengeService->store($request->validated());

        return redirect()->route('challenges.index')->with(['message' => __('admin.successmessage')]);
    }

    /**
     * Display the specified resource.
     */
    public function show($challenge)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        $this->authorize('update_challenges');

        $challenge = $this->challengeService->show($id);
        $challengecategories = $this->challengeCategoryService->findBy(request());

        return view(checkView('dashboard.challenges.edit'),  get_defined_vars());
    }

    /**
     * @param challengeRequest $request
     * @param              $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ChallengeRequest $request, $id)
    {
        $this->authorize('update_challenges');

        $this->challengeService->update($request->validated(), $id);
        return redirect()->route('challenges.index')->with(['message' => __('admin.updatesuccessmessage')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete_challenges');

        $this->challengeService->destroy($id);
    }
}
