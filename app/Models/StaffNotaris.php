<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StaffNotaris extends Model
{
    use HasFactory;

    public $timestamps = FALSE;
    protected $guarded = ['id'];

    public function notaris(): BelongsTo
    {
        return $this->belongsTo(Notaris::class);
    }
}
