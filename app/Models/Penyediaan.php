<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyediaan extends Model
{
    use HasFactory;
    protected $table = "penyediaan";

    protected $guarded = [
        'id'
    ];
}