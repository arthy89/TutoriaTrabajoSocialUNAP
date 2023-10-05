<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;

    protected $table = 'seguimientos';

    protected $primaryKey = "id_seg";

    protected $fillable = [
        'num_seg',
        'user',
        'titulo',
        'observaciones',
        'tutor',

    ];
}
