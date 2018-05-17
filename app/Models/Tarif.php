<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tarif
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $slug
 * @property float $value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tarif whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tarif whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tarif whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tarif whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tarif whereValue($value)
 * @property float $additionalValue
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tarif whereAdditionalValue($value)
 */
class Tarif extends Model
{
    //
}
