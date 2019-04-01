<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Message
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newQuery()
 */
class Message extends Model
{
    protected $fillable = [
        'name' , 'email' , 'title' , 'content'
    ];
}
