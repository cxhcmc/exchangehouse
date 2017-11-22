<?php

require_once("Site.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/SqlCondition.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/SimpleRest.php");

/**
 * 数据访问类,用于将数据源以不同的数据形式以REST方式发送
 * 此类需要继承 SimpleRest 基类
 */
class SiteRestHandler extends SimpleRest {

    function getSitesAPI($tablename, $field, $condition) {

        $site = new Site(new SQLCondition());
        $rawData = $site->getSource($tablename, $field, $condition);

//        if (empty($rawData)) {
//            $statusCode = 204;
//            $rawData = array('error' => 'No sites found!');
//        } else {
        $statusCode = 200;
//        }

        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($requestContentType, $statusCode);
        $this->responeData($requestContentType, $rawData);
    }

}
