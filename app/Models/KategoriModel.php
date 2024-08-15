<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    public function getBungas()
    {
        return $this->belongsToMany(BungaModel::class,'kategori_bunga', 'kategori_id','bunga_id'); //
    }
}
