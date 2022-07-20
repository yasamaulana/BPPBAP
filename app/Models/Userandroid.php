<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userandroid extends Model
{
    use HasFactory;
    //user
    protected $table = "userandroids";

    protected $fillable = [
        'nama',
        'alamat',
        'nomor',
        'tgl_lahir',
        'pekerjaan',
        'email',
        'username',
        'password',
    ];
}