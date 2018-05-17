<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Warm
 *
 * @mixin \Eloquent
 * @property int $id
 * @property float $amount
 * @property int|null $value
 * @property float|null $cost
 * @property string|null $comment
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Warm whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Warm whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Warm whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Warm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Warm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Warm whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Warm whereValue($value)
 */
class Warm extends Model
{
    protected $table = 'warms';

    protected $fillable = ['amount', 'cost', 'comment'];


    public static function getList()
    {
        return self::latest('created_at')->get();
    }
}
