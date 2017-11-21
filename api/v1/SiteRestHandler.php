<?php

require_once("Site.php");
require_once "../core/SqlCondition.php";
require_once 'core/SimpleRest.php';

/**
 * 数据访问类,用于将数据源以不同的数据形式以REST方式发送
 * 此类需要继承 SimpleRest 基类
 */
class SiteRestHandler extends SimpleRest {

    function getSitesAPI($tablename, $field, $condition) {

        $site = new Site(new SQLCondition());
        $rawData = $site->getSource($tablename, $field, $condition);

        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'No sites found!');
        } else {
            $statusCode = 200;
        }

        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($requestContentType, $statusCode);
        if (strpos($requestContentType, 'application/json') !== false) {
            $response = $this->encodeJson($rawData);
            echo $response;
        } else if (strpos($requestContentType, 'text/html') !== false) {
            $response = $this->encodeHtml($rawData);
            echo $response;
        } else if (strpos($requestContentType, 'application/xml') !== false) {
            $response = $this->encodeXml($rawData);
            echo $response;
        }
    }

}
