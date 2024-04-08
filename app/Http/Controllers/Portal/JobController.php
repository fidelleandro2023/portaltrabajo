<?php

namespace App\Http\Controllers\Portal;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Controllers\Controller;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('modules.banks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Job::latest()->paginate(10);
        return view('modules.banks.create', compact('list'));
    }

    public function list()
    {
      $list = Job::latest()->paginate(10);
      return view('modules.banks.list', compact('list'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        \DB::beginTransaction();
        try {
                Job::create($request->validated());
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
    public function show(Job $job)
    {
        $list = Job::find($job);
        return view('modules.banks.show', compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $list = Job::find($job);
        return view('modules.banks.edit', compact('list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        \DB::beginTransaction();
        try {
                $job->update([
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
    public function destroy(Job $job)
    {
        \DB::beginTransaction();
     try {
          \DB::commit();
          $bank = Job::find($job)->delete();
          \Session::flash('message', 'bank deleted');
     } catch (\Exception $e) {
         \DB::rollBack();
         throw $e;
     } catch (\Throwable $e) {
         \DB::rollBack();
         throw $e;
     }
     return redirect()->route('banks.list')->with('message', 'bank Deleted Successfully');
    }

    public function search(Request $request)
    {
       $origin = "search";
       $search = $request->input('search');
  
       $resultsSearch = Job::where(function($query) use ($search) {
                            $query->orWhere('name', 'LIKE', "%{$search}%");
                            $query->orWhere('description', 'LIKE', "%{$search}%");
                         })
                         ->paginate(10);
       return view('modules.banks.list', compact('origin', 'search','resultsSearch'));
    }
}
