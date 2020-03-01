<?php
//development mode
ini_set('display_errors',"On");
require __DIR__."/vendor/autoload.php";

//echo $_SERVER["REQUEST_URI"];
use Rentit\App;

App::run();
