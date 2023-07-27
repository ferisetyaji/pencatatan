<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class transaksiModel extends Model{
    
    use HasFactory;
    
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_kategori',
        'nama_kategori', 
        'jenis_transaksi',
        'nominal',
        'deskripsi',
        'created_at',
        'updated_at',
    ];
}