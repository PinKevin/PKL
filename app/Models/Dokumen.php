<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokumen extends Model
{
    use HasFactory;

    public $timestamps = FALSE;
    protected $guarded = ['id'];

    public function debitur(): BelongsTo
    {
        return $this->belongsTo(Debitur::class);
    }
}
