<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bintek extends Model
{
    use HasFactory;
    protected $table = 'bintek';

    protected $guarded = ['id'];
}