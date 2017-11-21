<?php

require_once("version/" . $_GET["ver"] . "/SiteRestHandler.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/version/auth/authorization.php");

$auth = new authorization(null, null);
if ($auth->getAuthorizationStatus()) {
    $hander = new SiteRestHandler();
    $field = $hander->_get("fields");
    $tablename = $hander->_get("tname");
    $condition = $hander->_get("con");

     $hander->getSitesAPI($tablename, $field, $condition);
}
