<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * App\Post
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $category_id
 * @property string $featured
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Post onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Post withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property int $user_id
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUserId($value)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static bool|null restore()
 */
class Post extends Model
{

    use SoftDeletes;

    protected $fillable =[
        'title',
        'content',
        'featured',
        'category_id',
        'user_id',
        'slug',
    ];

    protected $dates=['deleted_at'];

    //Post and Category relationship
    public function category(){
        return $this->belongsTo('App\Category');
    }

    //Post and Tag relationship
    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    //Post and User relationship
    public function user(){
        return $this->belongsTo('App\User');
    }

//    public function getFeaturedAttribute($featured){
//        return asset('storage/uploads/posts').'/'.$featured;
//    }
}
