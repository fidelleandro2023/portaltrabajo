<?php

namespace App\Http\Controllers\AdminLte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchLteController extends Controller
{
    /**
     * Show the navbar search results..
     */
    public function showNavbarSearchResults(Request $request)
    {
       // Check that the search keyword is present.
       if (! $request->filled('searchVal')) {
         return back();
       }
      // Get the search keyword.
      $keyword = $request->input('searchVal');
      Log::info("A navbar search was triggered with next keyword => {$keyword}");
      // TODO: Create the search logic and return adequate response (maybe a view
      // with the results).
      // ...
    }
}