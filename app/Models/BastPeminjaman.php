<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BastPeminjaman extends Model
{
    use HasFactory;

    public $table = 'bast_peminjaman';
    public $timestamps = FALSE;

    protected $guarded = ['id'];

    public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class);
    }
}
