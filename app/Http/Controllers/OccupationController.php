<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use App\Http\Requests\StoreOccupationRequest;
use App\Http\Requests\UpdateOccupationRequest;

class OccupationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Occupation.banks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Occupation::latest()->paginate(10);
        return view('Occupation.banks.create', compact('list'));
    }

    public function list()
    {
      $list = Occupation::latest()->paginate(10);
      return view('modules.banks.list', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOccupationRequest $request)
    {
        \DB::beginTransaction();
        try {
            Occupation::create($request->validated());
                \DB::commit();
                \Session::flash('message', 'bank created');
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        } catch (\Throwable $e) {
            \DB::rollBack();
            throw $e;
        }
   
        return redirect()->route('Company.list')->with('message', 'bank Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Occupation $occupation)
    {
        $list = Occupation::find($occupation);
        return view('modules.banks.show', compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Occupation $occupation)
    {
        $list = Occupation::find($occupation);
        return view('modules.banks.edit', compact('list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOccupationRequest $request, Occupation $occupation)
    {
        \DB::beginTransaction();
        try {
                $occupation->update([
                    'name' => $request->name,
                    'description' => $request->description
                ]);
                \DB::commit();
                \Session::flash('message', 'bank update');
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        } catch (\Throwable $e) {
            \DB::rollBack();
            throw $e;
        }
        return redirect()->route('banks.list')->with('message', 'bank updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Occupation $occupation)
    {
        //
    }

    public function search(Request $request)
    {
       $origin = "search";
       $search = $request->input('search');
  
       $resultsSearch = CompanyCategory::where(function($query) use ($search) {
                            $query->orWhere('name', 'LIKE', "%{$search}%");
                            $query->orWhere('description', 'LIKE', "%{$search}%");
                         })
                         ->paginate(10);
       return view('modules.banks.list', compact('origin', 'search','resultsSearch'));
    }
}
