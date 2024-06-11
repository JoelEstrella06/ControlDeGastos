<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gastos extends Model
{
    use HasFactory;
    use SoftDeletes;
    //scope para gastos mensual
    public function scopeMes(Builder $query,$date=null):void
    {
        $date!=null
        ?$fecha=Carbon::create($date)
        :$fecha=Carbon::now();
        $rango= [$fecha->startOfMonth()->toDateString(),$fecha->endOfMonth()->toDateString()];
        $query->whereBetween('date',$rango);
    }
    public function categoria():BelongsTo
    {
        return $this->belongsTo(Categories::class,'categori_id');
    }
}
