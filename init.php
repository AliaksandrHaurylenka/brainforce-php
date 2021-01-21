<?php
session_start();

require_once ('classes/Database.php');
require_once ('classes/Config.php');
require_once ('classes/Validate.php');
require_once ('classes/Transformer.php');



$GLOBALS['config'] = [
  'mysql' => [
    'host' => 'localhost',
    'dbname' => 'brainforce-php',
    'username' => 'root',
    'password' => ''
  ], 
];
