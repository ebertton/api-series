<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = ['number', 'serie_id', ];
    public $timestamps = false;

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
