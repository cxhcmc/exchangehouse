<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$servername = "localhost";
$username = "root";
$password = "Ah71Bqji";
$dbname = "JDCRM";

function _get($str) {
    $val = !empty($_GET[$str]) ? $_GET[$str] : null;
    return $val;
}

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . iconv('gbk', 'utf-8', $conn->connect_error));
}
//echo "连接成功";
//$conn->close();
?>

