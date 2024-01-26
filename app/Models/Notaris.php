<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Notaris extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function debitur(): HasMany
    {
        return $this->hasMany(Debitur::class, 'kode_notaris', 'kode_notaris');
    }

    public function staffNotaris(): HasMany
    {
        return $this->hasMany(StaffNotaris::class);
    }
}
