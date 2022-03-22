<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Vaccine $vaccine)
    {
        $data = $vaccine->questions()->get();

        return view('backend.questions.index', compact('data', 'vaccine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Vaccine $vaccine)
    {
        return view('backend.questions.create', compact('vaccine'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(Vaccine $vaccine, QuestionRequest $request)
    {
        $question = $vaccine->questions()->create($request->except('_token'));

        return redirect()->route('question.show', [$vaccine, $question])->with('success', 'question created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Patient $vaccine
     * @return Application|Factory|View
     */
    public function show(Vaccine $vaccine, Question $question)
    {
        $question = $vaccine->questions()->find($question->id);
        return view('backend.questions.show', compact('question', 'vaccine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vaccine $vaccine
     * @return Application|Factory|View
     */
    public function edit(Vaccine $vaccine, Question $question)
    {
        $question = $vaccine->questions()->find($question->id);

        return view('backend.questions.edit', compact('question', 'vaccine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuestionRequest $request
     * @param Vaccine $vaccine
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(QuestionRequest $request, Vaccine $vaccine, Question $question)
    {
        $question = $vaccine->questions()->find($question->id);

        $question->update($request->except('_token'));

        return redirect()->route('question.show', [$vaccine, $question])->with('success', 'question updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vaccine $vaccine
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Vaccine $vaccine, Question $question)
    {
        $question = $vaccine->questions()->find($question->id);

        $question->delete();

        return redirect()->route('question.index', $vaccine)->with('success', 'question deleted successfully.');
    }


    /**
     *  Display a listing of the trashed resource.
     * @param Vaccine $vaccine
     * @return Renderable
     */
    public function trashed(Vaccine $vaccine)
    {
        $questions = $vaccine->questions()->trashed();
        return view('backend.questions.trashed', compact('questions'));
    }

    /**
     * force delete the specified resource from storage.
     * @param Vaccine $vaccine
     * @return Renderable
     */
    public function forceDelete($id)
    {
        $question = question::withTrashed()->find($id);

        $this->repository->forceDelete($question);

        return redirect()->route('question.trashed');
    }

    /**
     * Restore the specified resource from storage.
     * @param Vaccine $vaccine
     * @return Renderable
     */
    public function restore($id)
    {
        $question = question::withTrashed()->find($id);

        $this->repository->restore($question);

        return redirect()->route('question.trashed');
    }
}
