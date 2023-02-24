<?php 
$db = 'railway';
$host = 'containers-us-west-106.railway.app';
$password = 'al1Fjhxj6emvz0jTIrLk';
$port = '6126';
$user = 'root';

if($_SERVER['HTTP_HOST'] == $host){
    $link = mysqli_connect($host, $user, $password, $db, $port);
} else {
    $link = mysqli_connect('localhost', 'root', '', 'scake');
}
?>