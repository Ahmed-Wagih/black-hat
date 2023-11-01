<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Http\Requests\AgendaRequest;
use App\Models\Agenda;
use App\Services\Classes\AgendaService;
use App\Services\Classes\CategoryService;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    protected $agendaService;
    protected $categoryService;

    public function __construct(AgendaService  $agendaService,CategoryService $categoryService)
    {
        $this->agendaService = $agendaService;
        $this->categoryService = $categoryService;


    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->authorize('view_agendas');

        if ($request->ajax()) {
            $agendas = $this->agendaService->findBy($request);
            return response()->json($agendas);
        }
        return view(checkView('dashboard.agendas.index'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_agendas');

        $categories = $this->categoryService->findBy(request());

        return view(checkView('dashboard.agendas.create'),compact('categories'));
    }

    /**
     * @param agendaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AgendaRequest $request)
    {
        $this->authorize('create_agendas');

        $this->agendaService->store($request->validated());

        return redirect()->route('agendas.index')->with(['message'=>__('admin.successmessage')]);


    }

    /**
     * Display the specified resource.
     */
    public function show($agenda)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        $this->authorize('update_agendas');

        $agenda = $this->agendaService->show($id);
        $categories = $this->categoryService->findBy(request());

        return view(checkView('dashboard.agendas.edit'),  get_defined_vars());
    }

    /**
     * @param agendaRequest $request
     * @param              $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AgendaRequest $request, $id)
    {
        $this->authorize('update_agendas');

         $this->agendaService->update($request->validated(), $id);
        return redirect()->route('agendas.index')->with(['message'=>__('admin.updatesuccessmessage')]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete_agendas');

         $this->agendaService->destroy($id);
    }
}
