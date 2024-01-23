<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notaris extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function debitur()
    {
        return $this->hasMany(Debitur::class, 'kode_notaris', 'kode_notaris');
    }
}
