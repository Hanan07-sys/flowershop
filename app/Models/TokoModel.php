<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TokoModel extends Model
{
    use HasFactory;
    protected $table = 'toko';

    public function kontakToko()
    {
        return $this->hasOne(KontakTokoModel::class, 'toko_id');
    }
    
    public function bungas(): HasMany
    {
        return $this->hasMany(BungaModel::class, 'toko_id');
    }
}
