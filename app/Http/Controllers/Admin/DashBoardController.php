<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use App\Models\Category;
use App\Models\Chap;
use App\Models\Profile;
use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $stories = Story::all();
        $authors = Author::with('stories')->get();
        $users = User::all();
        $newRegisterUsers = User::latest()->take(4)->get();

        return view('admin.dashboard', compact(
            'categories',
            'stories',
            'authors',
            'users',
            'newRegisterUsers'
        ));
    }
}
