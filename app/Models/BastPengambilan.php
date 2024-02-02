<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BastPengambilan extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    protected $guarded = ['id'];

    public function pengambilan()
    {
        return $this->hasMany(Pengambilan::class);
    }

    public function debitur()
    {
        return $this->belongsTo(Debitur::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class, 'nama_developer');
    }
}
