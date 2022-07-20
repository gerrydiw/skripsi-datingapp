<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function places()
    {
        return $this->hasMany('App\Place');
    }
}
