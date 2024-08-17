<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KontakTokoModel extends Model
{
    use HasFactory;
    protected $table = 'kontak_toko';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_hp',
        'email',
        'toko_id',
        'alamat',
    ];

    public function toko(): BelongsTo
    {
        return $this->belongsTo(TokoModel::class, 'toko_id');
    }
}
