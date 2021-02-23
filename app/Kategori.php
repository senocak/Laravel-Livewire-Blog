<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Kategori
 *
 * @property int $id
 * @property string $baslik
 * @property string $url
 * @property string $resim
 * @property int $sira
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Yazi[] $yazilar
 * @property-read int|null $yazilar_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kategori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kategori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kategori query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kategori whereBaslik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kategori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kategori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kategori whereResim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kategori whereSira($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kategori whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Kategori whereUrl($value)
 * @mixin \Eloquent
 */
class Kategori extends Model{
    public function yazilar()    {
        return $this->hasMany('App\Yazi');
    }
}
