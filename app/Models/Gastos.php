<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gastos extends Model
{
    use HasFactory;

    public function categoria():BelongsTo
    {
        return $this->belongsTo(Categories::class,'categori_id');
    }
}
