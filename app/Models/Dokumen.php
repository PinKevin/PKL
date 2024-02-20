<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dokumen extends Model
{
    use HasFactory;

    public $timestamps = FALSE;
    protected $guarded = ['id'];

    public function debitur(): BelongsTo
    {
        return $this->belongsTo(Debitur::class);
    }

    public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function pengambilan(): HasMany
    {
        return $this->hasMany(Pengambilan::class);
    }
}
