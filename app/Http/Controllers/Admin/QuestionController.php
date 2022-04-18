<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Vaccine;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

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
        $vaccines = Vaccine::whereHas('questions')->get()->except($vaccine->id);
        return view('backend.questions.index', compact('data', 'vaccine', 'vaccines'));
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
        if ($request->input_type == "text") {
            $question = $vaccine->questions()->create($request->only('question', 'input_type'));
        } else {
            if (!$request->select_type) {
                $request->merge(["select_type" => "single"]);
            }
            $question = $vaccine->questions()->create($request->except('_token'));
        }

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

        if ($request->input_type == "text") {
            $request->merge([
                "select_type" => 'single',
                "options" => null,
            ]);
            $question->update($request->all());

        } else {
            if (!$request->select_type) {
                $request->merge(["select_type" => "single"]);
            }
            $question->update($request->except('_token'));
        }


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


    public function copy(Vaccine $vaccine, Request $request)
    {
        $vaccines = Vaccine::whereHas('questions')->get()->except($vaccine->id);
        $questions = Vaccine::find($request->target)->questions;
        // delete old
        $vaccine->questions()->delete();
        foreach ($questions as $question) {
            $newQuestion = $question->replicate();
            $newQuestion->vaccine_id = $vaccine->id;
            $newQuestion->save();
        }
        return redirect()->back()->with([
            'success' => 'vaccine\'s questions copied successfully.',
            'vaccine' => $vaccine,
            'vaccines' => $vaccines,
        ]);
    }
}
