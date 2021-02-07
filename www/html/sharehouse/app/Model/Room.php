<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = ['id'];

    /**
     * この部屋を持つ物件を取得
     */
    public function property()
    {
        return $this->belongsTo('App\Model\Property');
    }
}
