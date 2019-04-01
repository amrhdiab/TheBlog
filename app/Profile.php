<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Profile
 *
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $bio
 * @property string|null $avatar
 * @property string|null $facebook
 * @property string|null $youtube
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereYoutube($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile newQuery()
 */
class Profile extends Model
{
    protected $fillable = [
        'bio','avatar','facebook','youtube' , 'user_id' ,
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
