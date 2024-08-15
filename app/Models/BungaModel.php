<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BungaModel extends Model
{
    use HasFactory;
    protected $table = 'bunga';

    public function toko(): BelongsTo
    {
        return $this->belongsTo(TokoModel::class, 'toko_id');
    }
    public function getKategoris()
    {
        return $this->belongsToMany(KategoriModel::class,'kategori_bunga','bunga_id','kategori_id'); //

    }

}
