<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded = ['id'];

    /**
     * このエリアにある物件を取得
     */
    public function properties()
    {
        return $this->hasMany('App\Model\Property');
    }
}
