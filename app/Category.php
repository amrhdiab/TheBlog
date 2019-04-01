<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Category
 *
 * @property int                                                       $id
 * @property string                                                    $name
 * @property \Illuminate\Support\Carbon|null                           $created_at
 * @property \Illuminate\Support\Carbon|null                           $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Post[] $posts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Category withoutTrashed()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
 * @method static bool|null restore()
 */
class Category extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
