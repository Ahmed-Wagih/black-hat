<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\Classes\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryService  $categoryService)
    {
        $this->categoryService = $categoryService;

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->authorize('view_categories');

        if ($request->ajax()) {
            $categories = $this->categoryService->findBy($request);
            return response()->json($categories);
        }
        return view(checkView('dashboard.categories.index'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_categories');

        return view(checkView('dashboard.categories.create'));
    }

    /**
     * @param categoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $this->authorize('create_categories');

        $this->categoryService->store($request->validated());
        return redirect()->route('categories.index')->with(['message'=>__('admin.successmessage')]);


    }

    /**
     * Display the specified resource.
     */
    public function show($category)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        $this->authorize('update_categories');

        $category = $this->categoryService->show($id);
        return view(checkView('dashboard.categories.edit'),  get_defined_vars());
    }

    /**
     * @param categoryRequest $request
     * @param              $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->authorize('update_categories');

         $this->categoryService->update($request->validated(), $id);
        return redirect()->route('categories.index')->with(['message'=>__('admin.updatesuccessmessage')]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete_categories');

         $this->categoryService->destroy($id);
    }

}
