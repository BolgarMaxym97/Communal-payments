<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Light
 *
 * @mixin \Eloquent
 * @property int $id
 * @property float $amount
 * @property int $value
 * @property float|null $cost
 * @property string|null $comment
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Light whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Light whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Light whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Light whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Light whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Light whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Light whereValue($value)
 * @property float|null $additionalCost
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Light whereAdditionalCost($value)
 */
class Light extends Model
{
    protected $table = 'lights';

    protected $fillable = ['amount', 'value', 'cost', 'comment'];


    public static function getList()
    {
        return self::latest('created_at')->get();
    }
}
