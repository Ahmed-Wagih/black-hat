<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\InterestRequest;
use App\Services\Classes\InterestService;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    protected $interestService;

    public function __construct(InterestService  $interestService)
    {
        $this->interestService = $interestService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->authorize('view_interests');
        if ($request->ajax()) {
            $interests = $this->interestService->findBy($request);
            return response()->json($interests);
        }
        return view(checkView('dashboard.interests.index'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_interests');

        return view(checkView('dashboard.interests.create'));
    }

    /**
     * @param interestRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(InterestRequest $request)
    {
        $this->authorize('create_interests');

        $this->interestService->store($request->validated());
        return redirect()->route('interests.index')->with(['message' => __('admin.successmessage')]);
    }

    /**
     * Display the specified resource.
     */
    public function show($interest)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {

        $this->authorize('update_interests');

        $interest = $this->interestService->show($id);
        return view(checkView('dashboard.interests.edit'),  get_defined_vars());
    }

    /**
     * @param interestRequest $request
     * @param              $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(InterestRequest $request, $id)
    {
        $this->authorize('update_interests');

        $this->interestService->update($request->validated(), $id);
        return redirect()->route('interests.index')->with(['message' => __('admin.updatesuccessmessage')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete_interests');
        $this->interestService->destroy($id);
    }
}
