<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PictureModel extends Model
{
    use HasFactory;
    protected $table = 'picture';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'path',
    ];
}
