<?php

namespace App\Models;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class Database{

    function __construct()
    {

        $capsule = new Capsule();
        $capsule->addConnection([
            "driver"=>DBDRIVER,
            "host"=>DBHOST,
            "database" => DBNAME,
            "username" => DBUSER,
            "password" => DBPASS,
            "charset" => "utf8",
            "collation" => "utf8_unicode_ci",
            "prefix" => ""
        ]);
        $capsule->setAsGlobal();
        $capsule ->bootEloquent();
    }

    static function create(){

//          Database::getConnection()->statement('CREATE DATABASE :schema', array('schema' => "a5_orm"));

        Capsule::schema()->create('users', function (Blueprint  $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('passw');
            $table->string('email')->unique();
            $table->boolean('admin');
            $table->timestamps();
            $table->engine ="InnoDB";
            $table->charset ="utf8";
            $table->collation ="utf8_unicode_ci";
        });
        Capsule::schema()->create('apartments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('lloc');
            $table->integer('metres2');
            $table->timestamps();
            //un apartament només tindrà un propietari
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
        Capsule::schema()->create('ofertes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titol');
            $table->string('disponibilitat');
            $table->timestamps();
            $table->integer('apartment_id')->unique();
            $table->foreign('apartment_id')->references('id')->on('apartments');
        });


    }
}
