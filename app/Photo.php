<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $uploades = '/images/'; 
    protected $fillable = [
        'file'
    ];

    public function getFileAttribute($photo){
        return  $this->uploades . $photo;
    }
}
