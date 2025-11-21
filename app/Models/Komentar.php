<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';
    protected $fillable = 
    [
        'materi_id',
        'warga_id',
        'komen'
    ];
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }

}
