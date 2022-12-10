<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pembayaran extends Model
{

    public $table = "tbl_pembayaran";

    protected $fillable = ['id_faktur','id_bank', 'id_pengguna','tanggal','status'];

    protected $guarded = ['id'];

    use HasFactory;

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function faktur(): HasOne
    {
        return $this->hasOne(Faktur::class);
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }
   
}
