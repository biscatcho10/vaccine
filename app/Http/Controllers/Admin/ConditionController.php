<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConditionRequest;
use App\Models\Condition;
use App\Models\Vaccine;

class ConditionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Vaccine $vaccine)
    {
        $data = $vaccine->conditions()->get();

        return view('backend.conditions.index', compact('data', 'vaccine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Vaccine $vaccine)
    {
        return view('backend.conditions.create', compact('vaccine'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ConditionRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(Vaccine $vaccine, ConditionRequest $request)
    {
        $condition = $vaccine->conditions()->create($request->except('_token'));

        return redirect()->route('condition.show', [$vaccine, $condition])->with('success', 'condition created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Patient $vaccine
     * @return Application|Factory|View
     */
    public function show(Vaccine $vaccine, Condition $condition)
    {
        $condition = $vaccine->conditions()->find($condition->id);
        return view('backend.conditions.show', compact('condition', 'vaccine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vaccine $vaccine
     * @return Application|Factory|View
     */
    public function edit(Vaccine $vaccine, Condition $condition)
    {
        $condition = $vaccine->conditions()->find($condition->id);

        return view('backend.conditions.edit', compact('condition', 'vaccine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ConditionRequest $request
     * @param Vaccine $vaccine
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(ConditionRequest $request, Vaccine $vaccine, Condition $condition)
    {
        $condition = $vaccine->conditions()->find($condition->id);

        $condition->update($request->except('_token'));

        return redirect()->route('condition.show', [$vaccine, $condition])->with('success', 'condition updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vaccine $vaccine
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Vaccine $vaccine, Condition $condition)
    {
        $condition = $vaccine->conditions()->find($condition->id);

        $condition->delete();

        return redirect()->route('condition.index', $vaccine)->with('success', 'condition deleted successfully.');
    }


    /**
     *  Display a listing of the trashed resource.
     * @param Vaccine $vaccine
     * @return Renderable
     */
    public function trashed(Vaccine $vaccine)
    {
        $conditions = $vaccine->conditions()->trashed();
        return view('backend.conditions.trashed', compact('conditions'));
    }

    /**
     * force delete the specified resource from storage.
     * @param Vaccine $vaccine
     * @return Renderable
     */
    public function forceDelete($id)
    {
        $condition = Condition::withTrashed()->find($id);

        $this->repository->forceDelete($condition);

        return redirect()->route('condition.trashed');
    }

    /**
     * Restore the specified resource from storage.
     * @param Vaccine $vaccine
     * @return Renderable
     */
    public function restore($id)
    {
        $condition = Condition::withTrashed()->find($id);

        $this->repository->restore($condition);

        return redirect()->route('condition.trashed');
    }
}
