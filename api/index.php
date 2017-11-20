<?php

require_once("jdsource/SiteRestHandler.php");


$hander = new SiteRestHandler();

$field = $hander->_get("fields");
$tablename = $hander->_get("tname");
$condition = $hander->_get("con");

$hander->getSitesAPI($tablename, $field, $condition);
