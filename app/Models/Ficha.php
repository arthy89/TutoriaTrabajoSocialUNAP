<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;

    protected $table = "fichas";

    protected $primaryKey = "id_ficha";

    protected $fillable = [
        'user',
        'familia',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
