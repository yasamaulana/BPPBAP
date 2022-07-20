<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goes extends Model
{
    use HasFactory;
    protected $table = 'goes';
    protected $guarded = ['id'];
}