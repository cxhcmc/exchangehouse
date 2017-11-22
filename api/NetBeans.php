<?php

require_once("version/" . $_GET["ver"] . "/SiteRestHandler.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/version/auth/authorization.php");

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: content-type,x-apicloud-appid,x-apicloud-appkey');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

$auth = new authorization(null, null);
$flag = $auth->getAuthorizationStatus();
if ($flag == TRUE) {
    
//    header('WWW-Authenticate: Basic realm="My Realm"');
//    header('HTTP/1.0 401 Unauthorized');
//    header('status: 401 Unauthorized');
//    echo 'Text to send if user hits Cancel button';
    $hander = new SiteRestHandler();
    $field = $hander->_get("fields");
    $tablename = $hander->_get("tname");
    $condition = $hander->_get("con");

    $hander->getSitesAPI($tablename, $field, $condition);
} else {
    $auth->SetHeard_401("登录失败", 203);
}

