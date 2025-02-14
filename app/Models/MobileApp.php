<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileApp extends Model
{
    use HasFactory;
    protected $table = 'mobile_apps';
    protected $fillable = ['project', 'dbname', 'url', 'server_name', 'created_at', 'updated_at'];
}
