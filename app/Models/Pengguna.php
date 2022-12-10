<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengguna extends Model
{
    public $table = "tbl_pengguna";

    protected $fillable = ['nama', 'email', 'password'];

    protected $guarded = ['id'];
    
    use HasFactory;

    public function tagihan(): HasMany
    {
        return $this->hasMany(Tagihan::class);
    }

    public function faktur(): HasMany
    {
        return $this->hasMany(Faktur::class);
    }

    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class);
    }

   
}
