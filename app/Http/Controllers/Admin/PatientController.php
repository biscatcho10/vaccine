<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class PatientController extends Controller
{
    /**
     * The repository instance.
     *
     * @var UserRepository
     */
    private $repository;

    /**
     * AdminController constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = $this->repository->all();

        return view('backend.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PatientRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(PatientRequest $request)
    {
        $user = $this->repository->create($request->all());

        return redirect()->route('user.show', $user)->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Patient $user
     * @return Application|Factory|View
     */
    public function show(Patient $user)
    {
        $user = $this->repository->find($user);
        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Patient $user
     * @return Application|Factory|View
     */
    public function edit(Patient $user)
    {
        $user = $this->repository->find($user);

        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PatientRequest $request
     * @param Patient $user
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(PatientRequest $request, Patient $user)
    {
        $user = $this->repository->update($user, $request->all());

        return redirect()->route('user.show', $user)->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Patient $user
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Patient $user)
    {
        $this->repository->delete($user);

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }


    /**
     *  Display a listing of the trashed resource.
     * @param Patient $user
     * @return Renderable
     */
    public function trashed()
    {
        $users = $this->repository->trashed();
        return view('backend.users.trashed', compact('users'));
    }

    /**
     * force delete the specified resource from storage.
     * @param Patient $user
     * @return Renderable
     */
    public function forceDelete($id)
    {
        $user = Patient::withTrashed()->find($id);

        $this->repository->forceDelete($user);

        return redirect()->route('user.trashed');
    }

    /**
     * Restore the specified resource from storage.
     * @param Patient $user
     * @return Renderable
     */
    public function restore($id)
    {
        $user = Patient::withTrashed()->find($id);

        $this->repository->restore($user);

        return redirect()->route('user.trashed');
    }
}
