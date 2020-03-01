<?php


namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table='apartments';
    protected $fillable=['title','lloc','metres2','user_id'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function oferta(){
        $this->hasOne('App\Oferta');
    }
}
