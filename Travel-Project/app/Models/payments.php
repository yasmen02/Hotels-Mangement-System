<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    use HasFactory;
     protected $fillable=[
         'user_id' ,
         'booking_id' ,
         'booking_id.*' ,
         'payment_method' ,
         'payment_type' ,
         'card_holder' ,
         'exp_month' ,
         'exp_year' ,
         'card_number',
         'cvc'  ,
         'amount',
         'payment_date',
         'transaction_id'
     ];
}
