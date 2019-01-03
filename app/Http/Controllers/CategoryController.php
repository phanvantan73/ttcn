<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::all();
    }

    public function show($id)
    {
        $categories = $this->categories;
        $category = Category::findOrFail($id);
        $stories = $category->stories()->with('author', 'users', 'chaps')->take(6)->get();
        $newestStories = $category->stories()->with('author', 'users', 'chaps')->latest()->take(5)->get();
        $moreReadingStories = $category->stories()->with('author', 'users')->latest()->take(5)->get();

        return view('categories.detail', compact(
            'category',
            'stories',
            'newestStories',
            'categories',
            'moreReadingStories'
        ));
    }

    public function getAllStoriesOfCategory($id)
    {
        $categories = $this->categories;
        $category = Category::findOrFail($id);
        $allStories = $category->stories()->with('author', 'users', 'chaps')->paginate(10);
        $moreReadingStories = $category->stories()->with('author', 'users')->latest()->take(5)->get();

        return view('categories.all-stories', compact(
           'categories',
           'category',
           'allStories',
           'moreReadingStories'
        ));
    }
}
