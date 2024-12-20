<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckDiscount extends Model
{
    use HasFactory;
    protected $fillable = ['card_code', 'cvv_code', 'discountValue', 'created_at', 'updated_at'];
}
