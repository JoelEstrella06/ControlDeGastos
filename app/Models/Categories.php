<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    use HasFactory;
    //scope para gastos del mes

    public function scopeGastosMes(Builder $query, $date=''):void
    {
        $fecha=Carbon::create($date);
        $rango= [$fecha->startOfMonth()->toDateString(),$fecha->endOfMonth()->toDateString()];
        $query->whereHas('gastos',function(Builder $gasto)use($rango){
            $gasto->whereBetween('date',$rango);
        });
    }

    public function gastos():HasMany
    {
        return $this->hasMany(Gastos::class,'categori_id');
    }
}
