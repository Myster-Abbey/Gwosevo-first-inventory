<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registrars extends Model
{
    use HasFactory;
    protected $fillable = ['msisdn', 'network', 'shop_name', 'location', 'shopowner_name', 'shopowner_number', 'card_code', 'cvv_code', 'created_at'];


}
