<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SupportTicket
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read int|null $comments_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SupportTicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SupportTicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SupportTicket query()
 * @mixin \Eloquent
 */
class SupportTicket extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
