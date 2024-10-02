<?php

namespace App\Http\Controllers;

use App\Models\reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    //
    public function create(){
        return view('reviews.create');
    }
    public function store(Request $request){
//        dd($request->all());
       $validatedData = $request->validate([
           'hotel_id' => 'required|exists:hotels,id',
           'user_id' => 'required|exists:users,id',
           'rating' => 'required',
           'comment'=>'required',
           'review_date'=>'required'
       ]);
//       dd($validatedData);
       reviews::create($validatedData);
       return redirect('/');
    }
}
