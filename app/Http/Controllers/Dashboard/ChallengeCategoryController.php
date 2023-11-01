<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChallengeCategoryRequest;
use App\Services\Classes\ChallengeCategoryService;
use Illuminate\Http\Request;

class ChallengeCategoryController extends Controller
{
    protected $challengecategoryService;

    public function __construct(ChallengeCategoryService  $challengecategoryService)
    {
        $this->challengecategoryService = $challengecategoryService;

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->authorize('view_challengecategories');

        if ($request->ajax()) {
            $challengecategories = $this->challengecategoryService->findBy($request);
            return response()->json($challengecategories);
        }
        return view(checkView('dashboard.challengecategories.index'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_challengecategories');

        return view(checkView('dashboard.challengecategories.create'));
    }

    /**
     * @param categoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ChallengeCategoryRequest $request)
    {
        $this->authorize('create_challengecategories');

        $this->challengecategoryService->store($request->validated());
        return redirect()->route('challengecategories.index')->with(['message'=>__('admin.successmessage')]);


    }

    /**
     * Display the specified resource.
     */
    public function show($challengecategory)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        $this->authorize('update_challengecategories');

        $challengecategory = $this->challengecategoryService->show($id);
        return view(checkView('dashboard.challengecategories.edit'),  get_defined_vars());
    }

    /**
     * @param categoryRequest $request
     * @param              $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ChallengeCategoryRequest $request, $id)
    {
     
        $this->authorize('update_challengecategories');

         $this->challengecategoryService->update($request->validated(), $id);
        return redirect()->route('challengecategories.index')->with(['message'=>__('admin.updatesuccessmessage')]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $this->authorize('delete_challengecategories');

         $this->challengecategoryService->destroy($id);
    }

}
