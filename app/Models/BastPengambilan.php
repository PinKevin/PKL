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
}
