<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banners;
use App\Models\Blogs;
use App\Models\Contact;
use App\Models\reviews;
use Illuminate\Http\Request;

class PagesCotroller extends Controller
{
    //
    public function index(){
        $blogs=Blogs::orderBy('created_at', 'desc')->limit(3)->get();
        $banners = Banners::with('room.hotel')->get();
        $about = About::first();
        $reviews = Reviews::orderBy('created_at', 'desc')->limit(3)->get();
        return view('Pages/welcome',compact('blogs','banners','about','reviews'));
    }
    public function about()
    {
        $about = About::first();
        $reviews = Reviews::orderBy('created_at', 'desc')->limit(3)->get();
        return view('Pages/about',compact('about','reviews'));
    }
    public function contact()
    {
        $about = About::first();
        return view('Pages/contact',compact('about'));
    }
    public function blog()
    {
        $blogs=Blogs::with('admin')->get();
        return view('Pages/blog',compact('blogs'));
    }

}
