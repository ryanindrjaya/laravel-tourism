<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;
    public $table = "acara";
    protected $fillable = [
        'name', 'desc', 'desa', 'kecamatan', 'start', 'end'
    ];
}
