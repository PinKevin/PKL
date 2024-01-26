<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    use HasFactory;

    public $timestamps = FALSE;
    public $table = 'peminjaman';
    protected $guarded = ['id'];

    public function dokumen(): BelongsTo
    {
        return $this->belongsTo(Dokumen::class);
    }

    public function bastPeminjaman(): BelongsTo
    {
        return $this->belongsTo(BastPeminjaman::class);
    }
}
