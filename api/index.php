<?php

require_once("v1/SiteRestHandler.php");


$hander = new SiteRestHandler();

$field = $hander->_get("fields");
$tablename = $hander->_get("tname");
$condition = $hander->_get("con");

$hander->getSitesAPI($tablename, $field, $condition);
