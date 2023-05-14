<?php 
$db = 'railway';
$host = 'containers-us-west-202.railway.app';
$password = 'ta6s0uLKresrqufBI5XV';
$port = '7347';
$user = 'root';

if($_SERVER['HTTP_HOST'] == 'scake' || $_SERVER['HTTP_HOST'] == 'localhost'){
    // MY LOCAL BASE
    $link = new mysqli('localhost', 'root', 'root', 'scake');
} else {
    // RAILWAY MYSQL BASE
    $link = new mysqli($host, $user, $password, $db, $port);
}

?>