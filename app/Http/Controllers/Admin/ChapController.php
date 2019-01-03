<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChapController extends Controller
{
    public function index()
    {
        $chaps = Chap::with('story')->get();

        return view('admin.chaps.index', compact('chaps'));
    }
}
