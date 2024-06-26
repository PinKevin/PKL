<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    protected $guarded = ['id'];

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class);
    }

    public function bastPengambilan()
    {
        return $this->belongsTo(BastPengambilan::class);
    }
}
