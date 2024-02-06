<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BastPeminjaman extends Model
{
    use HasFactory;

    public $table = 'bast_peminjaman';

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_jatuh_tempo' => 'date',
    ];

    public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function pemberi()
    {
        return $this->belongsTo(User::class, 'pemberi');
    }

    public function peminjam()
    {
        return $this->belongsTo(StaffNotaris::class, 'peminjam');
    }

    public function peminta()
    {
        return $this->belongsTo(StaffCabang::class, 'peminta');
    }

    public function suratRoya()
    {
        return $this->belongsTo(SuratRoya::class);
    }
}
