<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class User extends Model
{
    protected $table='users';
    protected $fillable=['nom','email','passw'];
    //default values
    protected $attributes=[
        'admin'=>0
    ];

    public  function apartments(){
        return $this->hasMany('app\models\Apartment');
    }
}