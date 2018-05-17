<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Comunal
 *
 * @mixin \Eloquent
 * @property int $id
 * @property float $amount
 * @property float|null $cost
 * @property string|null $comment
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comunal whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comunal whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comunal whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comunal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comunal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comunal whereUpdatedAt($value)
 */
class Comunal extends Model
{
    protected $table = 'comunals';

    protected $fillable = ['amount', 'cost', 'comment'];


    public static function getList()
    {
        return self::latest('created_at')->get();
    }
}
