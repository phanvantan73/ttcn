<?php

namespace App\Http\Controllers\Admin;

use App\Models\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::with('category', 'author')->get();

        return view('admin.stories.index', compact('stories'));
    }
}
