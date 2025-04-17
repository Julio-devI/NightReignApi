<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @apiResource App\Models\WeaponCategory
 * @apiResourceModel App\Models\WeaponCategory
 * @apiProperty string $name required
 * @apiProperty string $description required
 */
class WeaponCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];
}
