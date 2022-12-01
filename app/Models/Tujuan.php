<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    public $table = "tbl_tujuan";

    protected $fillable = ['nama', 'alamat', 'email','telepon','penanggung_jawab'];

    protected $guarded = ['id'];

    use HasFactory;
}
