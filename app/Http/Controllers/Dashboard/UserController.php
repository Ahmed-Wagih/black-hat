<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\Classes\InterestService;
use App\Services\Classes\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    protected $interestService;
    public function __construct(UserService $userService, InterestService $interestService)
    {
        $this->userService = $userService;
        $this->interestService = $interestService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Contracts\Foundation\Application
    {
        $this->authorize('view_users');

        if ($request->ajax()) {
            $users = $this->userService->findBy($request);
            return response()->json($users);
        }
        return view(checkView('dashboard.users.index'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_users');

        $interests  = $this->interestService->findBy(request());
        return view(checkView('dashboard.users.create'), compact('interests'));
    }
    /**
     * @param UserRequest $request
     */
    public function store(UserRequest $request)
    {
        $this->authorize('create_users');

        $this->userService->store($request->validated());
        return redirect()->route('users.index')->with(['message' => __('admin.successmessage')]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $this->authorize('show_users');

        $user = $this->userService->find($id);
        if ($request->ajax())
            return response()->json($user);

        return view('dashboard.users.show', compact('user'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        $this->authorize('update_users');

        $user = $this->userService->show($id);
        $interests = $this->interestService->findBy(request());
        return view(checkView('dashboard.users.edit'), get_defined_vars());
    }

    /**
     * @param UserRequest $request
     * @param              $id
     */
    public function update(UserRequest $request, $id)
    {
        $this->authorize('update_users');

        $this->userService->update($request->validated(), $id);
        return redirect()->route('users.index')->with(['message' => __('admin.updatesuccessmessage')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete_users');

        $this->userService->destroy($id);
    }
}
