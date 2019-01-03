<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::with('stories')->get();

        return view('admin.authors.index', compact('authors'));
    }
}
