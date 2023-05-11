<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articals extends Model
{
    use HasFactory;
    protected $table = 'articals';//access the database and table
    protected $guarded = [];
}
