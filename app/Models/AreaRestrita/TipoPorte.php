<?php

namespace App\Models\AreaRestrita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPorte extends Model
{
    use HasFactory;

    protected $table = 'tipos_portes';

    protected $fillable = [
        'porte',
    ];
}
