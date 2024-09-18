<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    public function index(){
        $blogs = Blogs::all();
        return view('blogs.index', compact('blogs'));
    }
    public function create(){
        return view('blogs.create');
    }
    public function store(Request $request){
    $validate = request()->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'url' => 'required',
        'author' => 'required',
    ]);
        $validate['image'] = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $validate['image'] = $file->store('blogs_images', 'public');
        }

        Blogs::create($validate);
        return redirect()->route('blogs.index');
    }
    public function edit($id){
        $blog=Blogs::where('id', $id)->firstOrFail();
        return view('blogs.edit', compact('blog'));
    }
    public function update(Request $request,$id){
        $blog = Blogs::findOrFail($id);
        $validate = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' =>  'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'url' => 'required',
            'author' => 'required',
        ]);
        $validate['image'] = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $validate['image'] = $file->store('blogs_images', 'public');
        }


        $blog->update($validate);
        return redirect()->route('blogs.index');
    }
    public function destroy($id){
        Blogs::destroy($id);
        return redirect()->route('blogs.index');
    }
}
