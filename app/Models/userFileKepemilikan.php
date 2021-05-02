<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userFileKepemilikan extends Model
{
    use HasApiTokens,Notifiable;
    use HasFactory;

    //protected $table = 'userFileKepemilikan';   // bila di table saat migration atau lainnya akan ditambah belakang s secara default

    protected $fillable = [
        'namaPemilik', 'mime', 'data'
    ];
}
