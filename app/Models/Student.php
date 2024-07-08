<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = "students";
    protected $primaryKey = 'id';

    // Tentukan atribut yang dapat diisi
    protected $fillable = [
        'nama',
        'umur',
        'asal_sekolah',
        'jenis_kelamin',
        'foto',
    ];

    // Tentukan primary key jika bukan 'id'
   
}