<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class kategoriModel extends Model{
    
    use HasFactory;
    
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama_kategori', 
        'deskripsi_kategori',
        'tipe',
        'created_at',
        'updated_at',
    ];
}