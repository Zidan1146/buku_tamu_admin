<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $table = "tbl_tamu";

    // fillable columns
    protected $fillable = [
        "uuid",
        "username",
        "ip",
        "password"
    ];

    protected $hidden = [
        "password"
    ];
}
