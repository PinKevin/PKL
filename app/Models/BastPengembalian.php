<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BastPengembalian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_kembali' => 'date'
    ];

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }

    public function penerima()
    {
        return $this->belongsTo(User::class, 'penerima');
    }

    public function peminjam()
    {
        return $this->belongsTo(StaffNotaris::class, 'peminjam');
    }
}
