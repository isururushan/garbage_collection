<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insidents extends Model
{
    use HasFactory;
    protected $table = 'incident';//access the database and table
    protected $guarded = [];
}
