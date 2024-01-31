<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BastPengembalian extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    protected $guarded = ['id'];

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

    public function peminta()
    {
        return $this->belongsTo(StaffCabang::class, 'peminta');
    }
}
