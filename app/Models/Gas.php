<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Gas
 *
 * @mixin \Eloquent
 * @property int $id
 * @property float $amount
 * @property int $value
 * @property float|null $cost
 * @property string|null $comment
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gas whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gas whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gas whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gas whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gas whereValue($value)
 */
class Gas extends Model
{
    protected $table = 'gas';

    protected $fillable = ['amount', 'value', 'cost', 'comment'];


    public static function getList()
    {
        return self::latest('created_at')->get();
    }
}
