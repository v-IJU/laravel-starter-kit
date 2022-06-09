<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class WebController extends Controller
{
    public function index()
    
    {
        $blogs=Blog::all();
        //dd($blog);
        return view('frontend.dashboard',compact('blogs'));
    }
}
