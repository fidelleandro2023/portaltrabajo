<?php

namespace App\Http\Controllers\Portal;

use App\Models\ContractType;
use App\Http\Requests\StoreContractTypeRequest;
use App\Http\Requests\UpdateContractTypeRequest;
use App\Http\Controllers\Controller;
class ContractTypeController extends Controller
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
        $list = ContractType::latest()->paginate(10);
        return view('modules.banks.create', compact('list'));
    }

    public function list()
    {
        $list = ContractType::latest()->paginate(10);
        return view('modules.banks.list', compact('list'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContractTypeRequest $request)
    {
        \DB::beginTransaction();
        try {
            ContractType::create($request->validated());
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
    public function show(ContractType $contractType)
    {
        $list = ContractType::find($contractType);
        return view('modules.banks.show', compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContractType $contractType)
    {
        $list = ContractType::find($contractType);
        return view('modules.banks.edit', compact('list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractTypeRequest $request, ContractType $contractType)
    {
        \DB::beginTransaction();
        try {
                $contractType->update([
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
    public function destroy(ContractType $contractType)
    {
        \DB::beginTransaction();
     try {
          \DB::commit();
          $bank = ContractType::find($contractType)->delete();
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
  
       $resultsSearch = CompanyCategory::where(function($query) use ($search) {
                            $query->orWhere('name', 'LIKE', "%{$search}%");
                            $query->orWhere('description', 'LIKE', "%{$search}%");
                         })
                         ->paginate(10);
       return view('modules.banks.list', compact('origin', 'search','resultsSearch'));
    }
}
