<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Yazi
 *
 * @property int $id
 * @property string $baslik
 * @property string $url
 * @property string $icerik
 * @property int $kategori_id
 * @property string $etiketler
 * @property int $aktif
 * @property int $sira
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Kategori $kategori
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Yorum[] $yorum
 * @property-read int|null $yorum_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yazi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yazi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yazi query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yazi whereAktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yazi whereBaslik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yazi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yazi whereEtiketler($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yazi whereIcerik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yazi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yazi whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yazi whereSira($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yazi whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yazi whereUrl($value)
 * @mixin \Eloquent
 */
class Yazi extends Model{
    public function kategori(){
        return $this->belongsTo('App\Kategori');
    }
    public function yorum(){
        return $this->hasMany('App\Yorum');
    }
}
