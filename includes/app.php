<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//Conectar a la base de datos
$db = conectarDb();

use App\ActiveRecord;
use App\Vendedor;

ActiveRecord::setDB($db);