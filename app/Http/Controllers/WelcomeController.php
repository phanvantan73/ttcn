<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chap;
use App\Models\Story;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $newestStories = Story::latest()->take(3)->get();
        $newUpdateStories = Story::with('category', 'author')->latest()->take(10)->get();
        $finishStories = Story::with('author', 'users')->whereIsFinish(1)->get();
        $categories = Category::with('stories')->get();
        $newChaps = Chap::with('story')->latest()->get();

        return view('welcome', compact(
            'categories',
            'newestStories',
            'newUpdateStories',
            'finishStories',
            'newChaps'
            ));
    }
}
