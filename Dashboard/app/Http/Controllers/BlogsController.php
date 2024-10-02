<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blogs::all();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $validate = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'url' => 'required',
        ]);
        $validate['author']=Auth::guard('admin')->user()->id;
        $validate['image'] = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('images/blogs_images'), $file_name, 'public');
            $validate['image'] = $file_name;
        }

        Blogs::create($validate);
        return redirect()->route('blogs.index');
    }

    public function edit(Blogs $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blogs::findOrFail($id);
        $validate = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'url' => 'required',
            'author' => 'required',
        ]);
        if ($request->hasFile('image')) {
            // New image is uploaded
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('images/blogs_images'), $file_name);

            $validate['image'] = $file_name;
        } else {
            $validate['image'] = $blog->image;
        }


        $blog->update($validate);
        return redirect()->route('blogs.index');
    }
    public function destroy($id)
    {
        Blogs::destroy($id);
        return redirect()->route('blogs.index');
    }
}
