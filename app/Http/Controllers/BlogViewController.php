<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogViewController extends Controller
{
    // public function index(){
    //     $blogs = Blog::all();
    //     return view('new_blogs', compact('blogs'));
    // }


    public function index(){
        $latest_blogs = Blog::where('is_latest', 1)->latest()->take(6)->get();
        $trending_blogs = Blog::where('is_trending', 1)->latest()->take(2)->get();
        $popular_blogs = Blog::where('is_popular', 1)->latest()->take(3)->get();
        
        return view('new_blogs', compact('latest_blogs', 'trending_blogs', 'popular_blogs'));
    }
    
    public function show($slug){
        $blog = Blog::where('slug', $slug)->first();
        $latest_blogs = Blog::where('is_latest', 1)->latest()->take(6)->get();
        return view('new_bloginner2', compact('blog','latest_blogs'));

    }
    
}