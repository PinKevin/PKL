<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengembalian extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_kembali' => 'date'
    ];

    public function dokumen(): BelongsTo
    {
        return $this->belongsTo(Dokumen::class);
    }

    public function bastPengembalian(): BelongsTo
    {
        return $this->belongsTo(BastPengembalian::class);
    }
}
