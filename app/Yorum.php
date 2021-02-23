<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Yorum
 *
 * @property int $id
 * @property string $email
 * @property string $yorum
 * @property int $yazi_id
 * @property int $onay
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Kategori|null $kategori
 * @property-read \App\Yazi $yazi
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yorum newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yorum newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yorum query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yorum whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yorum whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yorum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yorum whereOnay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yorum whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yorum whereYaziId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Yorum whereYorum($value)
 * @mixin \Eloquent
 */
class Yorum extends Model{
    public function yazi(){
        return $this->belongsTo('App\Yazi');
    }
    public function kategori(){
        return $this->hasOneThrough('App\Kategori','App\Yazi','id','id','','kategori_id');
    }
}
