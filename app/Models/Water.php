<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Water
 *
 * @mixin \Eloquent
 * @property int $id
 * @property float $amount
 * @property int $value
 * @property float|null $cost
 * @property string|null $comment
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Water whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Water whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Water whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Water whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Water whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Water whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Water whereValue($value)
 */
class Water extends Model
{
    //
}
