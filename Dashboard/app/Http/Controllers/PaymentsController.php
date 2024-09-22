<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    //
    public function index(){
        $transactions=payments::all();
        return view('Payments.index',compact('transactions'));
    }
}
