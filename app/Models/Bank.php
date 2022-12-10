<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    public $table = "tbl_bank";

    protected $fillable = ['nama', 'akun', 'nomor_rekening'];

    protected $guarded = ['id'];

    use HasFactory;

    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class);
    }
}
