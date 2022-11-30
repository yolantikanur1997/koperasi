<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    public $table = "tbl_pengguna";

    protected $fillable = ['nama', 'email', 'password'];

    protected $guarded = ['id'];
    
    use HasFactory;
}
