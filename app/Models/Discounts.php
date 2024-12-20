<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    use HasFactory;
    protected $fillable = ['card_code', 'purchaseAmount', 'discount_amount', 'OTP', 'created_at', 'updated_at'];

}
