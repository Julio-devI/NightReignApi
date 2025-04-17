<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="weapon category",
 *     required={"name"},
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="description", type="string"),
 * )
 */
class WeaponCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];
}
