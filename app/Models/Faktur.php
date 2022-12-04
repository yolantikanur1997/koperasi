<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Faktur extends Model
{
    use AutoNumberTrait;

    public $table = "tbl_faktur";

    protected $fillable = ['id_pengguna', 'id_tagihan','kode_faktur','tanggal','status'];

    protected $guarded = ['id'];

    use HasFactory;

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function tagihan(): HasOne
    {
        return $this->hasOne(Tagihan::class);
    }

    public function getAutoNumberOptions()
    {
        return [
            'nomor_faktur' => [
                'format' => function () {
                    return 'NF/' . date('Ymd') . '/?';
                },
                'length' => 5 // The number of digits in an autonumber
            ]
        ];
    }
}
