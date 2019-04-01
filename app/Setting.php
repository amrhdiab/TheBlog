<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\setting
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $site_name
 * @property string $contact_number
 * @property string $contact_email
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereSiteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting newQuery()
 */
class Setting extends Model
{
    protected $fillable = [
        'site_name', 'contact_number', 'contact_email', 'address',
    ];
}
