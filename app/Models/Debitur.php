<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Debitur extends Model
{
    use HasFactory;

    public $timestamps = FALSE;
    protected $guarded = ['id'];

    public function dokumen(): HasMany
    {
        return $this->hasMany(Dokumen::class);
    }

    public function notaris()
    {
        return $this->belongsTo(Notaris::class, 'kode_notaris', 'kode_notaris');
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class, 'kode_developer', 'kode_developer');
    }
}
