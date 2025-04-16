<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'notes',
        'scaling',
        'physical_damage',
        'magical_damage',
        'fire_damage',
        'lightning_damage',
        'holy_damage',
        'critical_chance',
        'level_required',
        'physical_defense',
        'magical_defense',
        'fire_defense',
        'lightning_defense',
        'holy_defense',
        'boost'
    ];
}
