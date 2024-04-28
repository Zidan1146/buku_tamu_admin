<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory;

    // admin table
    // columns are (uuid, username, ip, password)
    // note, for passwords it'll be added with a bcrypt hash
    // password is hidden

    protected $table = "tbl_admin";
    protected $primaryKey = "uuid";
    public $incrementing = false;
    public $keyType = "string";

    // fillable columns
    protected $fillable = [
        "uuid",
        "username",
        "ip",
        "password",
        "status"
    ];

    protected $hidden = [
        "password"
    ];

}
