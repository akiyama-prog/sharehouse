<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = ['id'];

    /**
     * この物件のサブ写真を取得
     */
    public function sub_pictures()
    {
        return $this->hasMany('App\Model\SubPictures');
    }

    /**
     * この物件の部屋を取得
     */
    public function rooms()
    {
        return $this->hasMany('App\Model\Room');
    }

    /**
     * この物件のエリアを取得
     */
    public function area()
    {
        return $this->belongsTo('App\Model\Area');
    }
}
