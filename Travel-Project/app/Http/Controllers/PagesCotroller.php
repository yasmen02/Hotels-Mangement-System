<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banners;
use App\Models\Blogs;
use App\Models\Contact;
use Illuminate\Http\Request;

class PagesCotroller extends Controller
{
    //
    public function index(){
        $blogs=Blogs::orderBy('created_at', 'desc')->limit(3)->get();
        $banners = Banners::with('room.hotel')->get();
        $about = About::first();
        return view('Pages/welcome',compact('blogs','banners','about'));
    }
    public function about(){
        $about = About::first();
        return view('Pages/about',compact('about'));
    }
    public function contact(){
        $contact = Contact::first();
        return view('Pages/contact',compact('contact'));
    }
    public function blog(){
        $blogs=Blogs::orderBy('created_at', 'desc')->paginate(6);

        return view('Pages/blog',compact('blogs'));
    }
}
