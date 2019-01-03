<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chap;
use App\Models\Story;
use App\Models\Author;
use App\Traits\ProcessFile;
use File;

class StoryController extends Controller
{
    use ProcessFile;

    protected $storyPath;

    public function __construct()
    {
        $this->storyPath = public_path() . '/files/txt/story-';
    }

    public function getNewestStories()
    {
        $categories = Category::all();
        $newestStories = Story::with('author', 'category', 'users')->latest()->paginate(5);

        return view('stories.newest-stories', compact('newestStories', 'categories'));
    }

    public function getfinishStories()
    {
        $categories = Category::all();
        $finishStories = Story::with('author', 'category', 'users')->whereIsFinish(1)->latest()->paginate(5);

        return view('stories.finish-stories', compact('categories', 'finishStories'));
    }

    public function show($id)
    {
        $story = Story::with('category', 'author', 'users', 'chaps')->where('id', $id)->first();
        $newUpdateChaps = $story->chaps()->with('story')->latest()->take(3)->get();
        $firstChap = $story->getFirstChap();

        return view('stories.detail', compact(
            'story',
            'newUpdateChaps',
            'firstChap'
        ));
    }

    public function getListChaps($id)
    {
        $story = Story::with('category', 'author', 'users', 'chaps')->where('id', $id)->first();
        $chaps = $story->chaps()->with('story')->latest()->get();
        $firstChap = $story->getFirstChap();

        return view('stories.list-chaps', compact(
            'story',
            'newUpdateChaps',
            'chaps',
            'firstChap'
        ));
    }

    public function showChap($id)
    {
        $chap = Chap::with('story')->where('id', $id)->first();
        $chapContent = $this->readContentOfChap($this->storyPath, $chap);

        return view('chaps.detail', compact('chap', 'chapContent'));
    }

    public function check($query)
    {
    }
}
