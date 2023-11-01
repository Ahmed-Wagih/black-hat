<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\Classes\AgendaService;
use App\Services\Classes\CategoryService;

class AgendaController extends Controller
{
    protected $agendaService;
    protected $categoryService;

    public function __construct(AgendaService  $agendaService, CategoryService $categoryService)
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
        $agendaRequest = $request;

        $agendasQuery = Agenda::query();
        if($request->has('category_id') && $request->category_id !== null){
            $agendasQuery = $agendasQuery->where('category_id', $request->category_id);
        }
        $agendas = $agendasQuery->get();
        $categories = Category::get();
        return view('web.agendas', get_defined_vars());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function allAgenda(Request $request)
    {
        $agendaRequest = $request;

        $agendasQuery = Agenda::query();
        if($request->has('category_id') && $request->category_id !== null){
            $agendasQuery = $agendasQuery->where('category_id', $request->category_id);
        }
        $agendas = $agendasQuery->get();
        $categories = Category::get();
        return view('web.all_agendas', get_defined_vars());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $agenda = $this->agendaService->show($id);
        return view(checkView('web.agenda'), get_defined_vars());
    }

    public function search(Request $request)
    {
        if ($request->search) {
            $agendas = Agenda::where('name_ar', 'like', '%' . $request->search . '%')->orWhere('name_en', 'like', '%' . $request->search . '%')->orWhere('description_ar', 'like', '%' . $request->search . '%')->orWhere('description_en', 'like', '%' . $request->search . '%')->get();
            return view('web.compoonents.home_search_result', get_defined_vars());
        }
    }
}
