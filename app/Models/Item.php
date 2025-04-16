<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Item",
 *     required={"name"},
 *     @OA\Property(property="id", type="integer", format="int64"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="description", type="string"),
 *     @OA\Property(property="notes", type="string"),
 *     @OA\Property(property="Scaling", type="string"),
 *     @OA\Property(property="physical_damage", type="integer"),
 *     @OA\Property(property="magical_damage", type="integer"),
 *     @OA\Property(property="fire_damage", type="integer"),
 *     @OA\Property(property="lightning_damage", type="integer"),
 *     @OA\Property(property="holy_damage", type="integer"),
 *     @OA\Property(property="critical_chance", type="integer"),
 *     @OA\Property(property="level_required", type="integer"),
 *     @OA\Property(property="physical_defense", type="integer"),
 *     @OA\Property(property="magical_defense", type="integer"),
 *     @OA\Property(property="fire_defense", type="integer"),
 *     @OA\Property(property="lightning_defense", type="integer"),
 *     @OA\Property(property="holy_defense", type="integer"),
 *     @OA\Property(property="boost", type="integer"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time"),
 *     @OA\Property(property="deleted_at", type="string", format="date-time", nullable=true)
 * )
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
