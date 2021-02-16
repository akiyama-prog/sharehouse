<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomPictures extends Model
{
    protected $guarded = ['id'];

    /**
     * この部屋写真のデータをもつ物件を取得
     */
    public function property()
    {
        return $this->belongsTo('App\Model\Property');
    }
}
