<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffCabang extends Model
{
    use HasFactory;

    public $timestamps = FALSE;
    protected $guarded = ['id'];

    public function bastPeminjaman()
    {
        return $this->hasMany(BastPeminjaman::class, 'pemberi_perintah');
    }
}
