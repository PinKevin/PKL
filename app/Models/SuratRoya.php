<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratRoya extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_pelunasan' => 'date',
        'tanggal_sht' => 'date'
    ];

    public function kota()
    {
        return $this->belongsTo(Regency::class, 'kota_bpn', 'id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(District::class, 'kecamatan', 'id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Village::class, 'kelurahan', 'id');
    }
}
