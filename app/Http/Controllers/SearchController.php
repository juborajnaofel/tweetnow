<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function suggestions(Request $request)
    {
        $query = $request->input('query');

        $filteredSuggestions  = User::where('name','Like', '%'.$query.'%')->limit(10)->get();

        return response()->json($filteredSuggestions);
    }
}
