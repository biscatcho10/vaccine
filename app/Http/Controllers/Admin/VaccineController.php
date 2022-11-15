<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\RequestFilter;
use App\Http\Requests\VaccineRequest;
use App\Models\Exception;
use App\Models\RequestAnswer;
use App\Models\Vaccine;
use App\Repositories\VaccineRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VaccineController extends Controller
{
    /**
     * The repository instance.
     *
     * @var VaccineRepository
     */
    private $repository;
    private $filter;


    /**
     * AdminController constructor.
     *
     * @param VaccineRepository $repository
     */
    public function __construct(VaccineRepository $repository, RequestFilter $filter)
    {
        $this->repository = $repository;
        $this->filter = $filter;
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
        if (!$request->definded_period) {
            $request->merge(['definded_period' => false, 'from' => null, 'to' => null]);
        }
        if (!$request->has_diff_ages) {
            $request->merge(['has_diff_ages' => false, 'diff_ages' => null]);
        }
        if (!$request->require_hcm) {
            $request->merge(['require_hcm' => false]);
        }
        if (!$request->need_comment) {
            $request->merge(['need_comment' => false]);
        }
        if (!$request->out_of_stock) {
            $request->merge(['out_of_stock' => false]);
        }

        $vaccine = $this->repository->create($request->except('_token'));

        return redirect()->route('vaccine.show', $vaccine)->with('success', 'service created successfully.');
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
        $requests = $vaccine->requests;

        if ($vaccine->requests->count() > 0) {
            $time = DB::table('request_answers')
                ->select('day_time')
                ->where('vaccine_id', $vaccine->id)
                ->groupBy('day_time')
                ->orderByRaw('COUNT(*) DESC')
                ->limit(1)
                ->get()[0]->day_time;
        } else {
            $time = "No times yet";
        }


        $user_count = RequestAnswer::where('vaccine_id', $vaccine->id)->count();


        return view('backend.vaccines.show', compact('vaccine', 'requests', 'time', 'user_count'));
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
        $days = $vaccine->days->pluck('name')->toArray();

        return view('backend.vaccines.edit', compact('vaccine', 'days'));
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
        if (!$request->definded_period) {
            $request->merge(['definded_period' => false, 'from' => null, 'to' => null]);
        }
        if (!$request->has_diff_ages) {
            $request->merge(['has_diff_ages' => false, 'diff_ages' => null]);
        }
        if (!$request->require_hcm) {
            $request->merge(['require_hcm' => false]);
        }
        if (!$request->need_comment) {
            $request->merge(['need_comment' => false]);
        }
        if (!$request->out_of_stock) {
            $request->merge(['out_of_stock' => false]);
        }
        $vaccine = $this->repository->update($vaccine, $request->except('_token'));

        return redirect()->route('vaccine.show', $vaccine)->with('success', 'service updated successfully.');
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

        return redirect()->route('vaccine.index')->with('success', 'service deleted successfully.');
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


    /**
     *  Display a listing of the resource.
     */
    public function allRequests()
    {
        $services = Vaccine::all();
        $requests = RequestAnswer::filter($this->filter)->get();
        return view('backend.requests.index', compact('requests', 'services'));
    }


    public function getRequest(Vaccine $vaccine)
    {
        $requests = $vaccine->requests;
        return view('backend.requests.vaccine-requests', compact('requests', 'vaccine'));
    }


    public function showRequest(Vaccine $vaccine, $id)
    {
        $request = $vaccine->requests->find($id);
        return view('backend.requests.show', compact('request', 'vaccine'));
    }

    public function cancelRequest(Vaccine $vaccine, $id)
    {
        $request = $vaccine->requests->find($id);
        $request->delete();
        // update vaccine amount
        $vaccine->update(['amount' => $vaccine->amount + 1]);
        return redirect()->route('vaccine.show', $vaccine)->with('success', 'Request canceled successfully.');
    }


    public function order (Request $request)
    {
        foreach ($request->services as $key => $service) {
            $order = $key + 1;
            Vaccine::where('id', $service)->update([
                'order' => $order,
            ]);
        }

        return redirect()->back()->with('success', 'Services ordered successfully.');
    }


    public function ordered()
    {
        $data = $this->repository->all();

        return view('backend.vaccines.order', compact('data'));
    }


}
