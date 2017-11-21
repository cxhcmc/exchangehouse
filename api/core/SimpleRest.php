<?php

/*
 * 一个简单的 RESTful web services 基类
 * 我们可以基于这个类来扩展需求
 */

class SimpleRest {

    private $httpVersion = "HTTP/1.1";

    public function setHttpHeaders($contentType, $statusCode) {

        $statusMessage = $this->getHttpStatusMessage($statusCode);
        header($this->httpVersion . " " . $statusCode . " " . $statusMessage);
        header("Content-Type:" . $contentType);
        //echo $this->httpVersion . " " . $statusCode . " " . $statusMessage;
    }

    public function getHttpStatusMessage($statusCode) {
        $httpStatus = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported');
        return ($httpStatus[$statusCode]) ? $httpStatus[$statusCode] : $status[500];
    }

    public function _get($str) {
        $val = !empty($_GET[$str]) ? $_GET[$str] : null;
        return $val;
    }

    public function encodeHtml($responseData) {

        $htmlResponse = "<table border='1'>";
        for ($i = 0; $i < count($responseData); $i++) {
            foreach ($responseData[$i] as $key => $value) {
                $htmlResponse .= "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
            }
        }
        $htmlResponse .= "</table>";
        return $htmlResponse;
    }

    public function encodeJson($responseData) {
        $jsonResponse = json_encode($responseData);
        return $jsonResponse;
    }

    public function encodeXml($responseData) {
        // 创建 SimpleXMLElement 对象
        $xml = new SimpleXMLElement('<?xml version="1.0"?><site></site>');
        for ($i = 0; $i < count($responseData); $i++) {
            foreach ($responseData[$i] as $key => $value) {
                $xml->addChild($key, $value);
            }
            return $xml->asXML();
        }
    }

    public function responeData($requestContentType, $rawData) {
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
