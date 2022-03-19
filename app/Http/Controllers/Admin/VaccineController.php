<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VaccineRequest;
use App\Models\Vaccine;
use App\Repositories\VaccineRepository;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    /**
     * The repository instance.
     *
     * @var VaccineRepository
     */
    private $repository;

    /**
     * AdminController constructor.
     *
     * @param VaccineRepository $repository
     */
    public function __construct(VaccineRepository $repository)
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

        return view('backend.vaccines.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backend.vaccines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VaccineRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(VaccineRequest $request)
    {
        $vaccine = $this->repository->create($request->except('_token'));

        return redirect()->route('vaccine.show', $vaccine)->with('success', 'vaccine created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Patient $vaccine
     * @return Application|Factory|View
     */
    public function show(Vaccine $vaccine)
    {
        $vaccine = $this->repository->find($vaccine);
        return view('backend.vaccines.show', compact('vaccine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vaccine $vaccine
     * @return Application|Factory|View
     */
    public function edit(Vaccine $vaccine)
    {
        $vaccine = $this->repository->find($vaccine);

        return view('backend.vaccines.edit', compact('vaccine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VaccineRequest $request
     * @param Vaccine $vaccine
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(VaccineRequest $request, Vaccine $vaccine)
    {
        $vaccine = $this->repository->update($vaccine, $request->except('_token'));

        return redirect()->route('vaccine.show', $vaccine)->with('success', 'vaccine updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vaccine $vaccine
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Vaccine $vaccine)
    {
        $this->repository->delete($vaccine);

        return redirect()->route('vaccine.index')->with('success', 'vaccine deleted successfully.');
    }


    /**
     *  Display a listing of the trashed resource.
     * @param Vaccine $vaccine
     * @return Renderable
     */
    public function trashed()
    {
        $vaccines = $this->repository->trashed();
        return view('backend.vaccines.trashed', compact('vaccines'));
    }

    /**
     * force delete the specified resource from storage.
     * @param Vaccine $vaccine
     * @return Renderable
     */
    public function forceDelete($id)
    {
        $vaccine = Vaccine::withTrashed()->find($id);

        $this->repository->forceDelete($vaccine);

        return redirect()->route('vaccine.trashed');
    }

    /**
     * Restore the specified resource from storage.
     * @param Vaccine $vaccine
     * @return Renderable
     */
    public function restore($id)
    {
        $vaccine = Vaccine::withTrashed()->find($id);

        $this->repository->restore($vaccine);

        return redirect()->route('vaccine.trashed');
    }
}
