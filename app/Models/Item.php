<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @apiResource App\Models\Item
 * @apiResourceModel App\Models\Item
 * @apiProperty string $name required
 * @apiProperty string $description
 * @apiProperty string $notes
 * @apiProperty string $scaling
 * @apiProperty integer $physical_damage
 * @apiProperty integer $magical_damage
 * @apiProperty integer $fire_damage
 * @apiProperty integer $lightning_damage
 * @apiProperty integer $holy_damage
 * @apiProperty integer $critical_chance
 * @apiProperty integer $level_required
 * @apiProperty integer $physical_defense
 * @apiProperty integer $magical_defense
 * @apiProperty integer $fire_defense
 * @apiProperty integer $lightning_defense
 * @apiProperty integer $holy_defense
 * @apiProperty integer $boost
 * @apiProperty string $created_at datetime
 * @apiProperty string $updated_at datetime
 * @apiProperty string|null $deleted_at datetime
 */


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
