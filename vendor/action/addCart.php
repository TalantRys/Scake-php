<?php include '../components/connect.php';
session_start();
$data = $_POST['carts'];
echo json_decode($data, JSON_UNESCAPED_UNICODE);