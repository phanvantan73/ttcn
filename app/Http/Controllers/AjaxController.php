<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getListChaps($id)
    {
        $storyId = $id;
        $story = Story::findOrFail($storyId);
        $chaps = $story->chaps;

        return view('ajax.list-chaps', compact('chaps', 'story'))->render();
    }

    public function autoComplete(Request $request)
    {
        $query = $request->only('query');
        $stories = Story::where('name', 'LIKE', '%' . $query . '%')->get();

        return view('ajax.search-story', compact('stories'))->render();
    }
}
