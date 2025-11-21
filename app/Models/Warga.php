<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;

class Warga extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'email',
        'role',
        'password'
    ];
    protected $table = 'warga';

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
}
