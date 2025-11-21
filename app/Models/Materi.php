<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Materi extends Model
{
    use Notifiable, HasFactory;
    protected $fillable = [
        'judul',
        'materi',
        'deskripsi'        
    ];

    protected $table = 'materi';

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
}
