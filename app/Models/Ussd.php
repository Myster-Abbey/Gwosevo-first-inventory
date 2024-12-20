<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ussd extends Model
{
    use HasFactory;

    protected $table = 'ussd';
    protected $fillable = ['campaign', 'shortcode', 'dbname', 'created_at', 'updated_at'];

}
