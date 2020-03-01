<?php
require __DIR__."/vendor/autoload.php";
session_start();//aqui ya va bien
require "config.php";
use App\Models\Database;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;
new Database();
//    Database::create();
use App\App;

App::run();




