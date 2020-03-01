<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table='ofertes';
    protected $fillable=['titol','disponibilitat','apartment_id'];
    public function Apartment(){
        return $this->belongsTo('App\Models\Apartment');
    }
}