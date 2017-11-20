<?php

require_once("jdsource/SqlConnction.php");


$field = _get("fields");
$tablename = _get("tname");
$condition = _get("con");

if ($tablename == NULL || $field == NULL) {
    $conn->close();
} else {
    $sql = "SELECT $field FROM $tablename where true and $condition";

    $result = $conn->query($sql);
    $arr = [];

    if ($result->num_rows > 0) {
        // 输出数据
        while ($row = $result->fetch_assoc()) {
            //  echo "手机: " . $row["crm_phonenumber"] . "   借款人: " . $row["name"] . " " . "<br>";
            $arr[] = $row;
        }
    }

    if ($arr) {
        echo json_encode($arr);
    }


    echo "<br>" . $result->num_rows . "条信息";
    $conn->close();

    // echo "实体:" . $_GET["tname"] . " 字段:" . $_GET["fields"] . " 条件" . $_GET["con"];
}