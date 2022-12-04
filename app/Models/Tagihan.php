<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Tagihan extends Model
{
    use AutoNumberTrait;

    public $table = "tbl_tagihan";

    protected $fillable = ['id_pengguna', 'id_tujuan','tanggal','uraian','nilai_tagihan','status'];

    protected $guarded = ['id'];

    use HasFactory;

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function tagihan(): BelongsTo
    {
        return $this->belongsTo(Faktur::class);
    }

    public function getAutoNumberOptions()
    {
        return [
            'nomor_tagihan' => [
                'format' => function () {
                    return 'NT/' . date('Ymd') . '/?';
                },
                'length' => 5 // The number of digits in an autonumber
            ]
        ];
    }
}
