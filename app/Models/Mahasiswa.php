<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    // Primary Key
    protected $primaryKey = 'NRP';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'NRP', 
        'id_user',
        'nama', 
        'alamat', 
        'gender', 
        'no_telp',
        'angkatan',
        'total_sks',
        'jurusan',
        'semester',
    ];

    public function has_user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
