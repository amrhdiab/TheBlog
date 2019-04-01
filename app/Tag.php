<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Tag
 *
 * @property int $id
 * @property string $tag
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Post[] $posts
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Tag onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tag withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Tag withoutTrashed()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag newQuery()
 * @method static bool|null restore()
 */
class Tag extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable =['tag'];

    public function posts(){
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
}
