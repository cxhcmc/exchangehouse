<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SQLCondition {

    public $servername = "localhost";
    public $username = "root";
    public $password = "Ah71Bqji";
    public $dbname = "JDCRM";
    public $conn = null;



    public function CreateSQLCon() {
        // 创建连接
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // 检测连接
        if ($this->conn->connect_error) {
            die("连接失败: " . iconv('gbk', 'utf-8', $this->conn->connect_error));
            return null;
        } else {
            return $this->conn;
        }
    }

//echo "连接成功";
//$conn->close();
}
