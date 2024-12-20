<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    use HasFactory;

    protected $table = 'webs';
    protected $fillable = ['project', 'dbname', 'url', 'server_name', 'created_at', 'updated_at'];

}
