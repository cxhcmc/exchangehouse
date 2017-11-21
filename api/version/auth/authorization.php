<?php

/**
 * 用户授权类
 */
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/SqlCondition.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/SimpleRest.php");

class authorization extends SimpleRest {

    private $appid = "";
    private $appkey = "";

    function __construct($appid, $appkey) {
        $this->appid = isset($_SERVER["HTTP_X_APICLOUD_APPID"]) ? $_SERVER["HTTP_X_APICLOUD_APPID"] : $appid;
        $this->appkey = isset($_SERVER["HTTP_X_APICLOUD_APPKEY"]) ? $_SERVER["HTTP_X_APICLOUD_APPKEY"] : $appkey;
    }

    public function getAuthorizationStatus() {
        if ($this->appid == NULL && $this->appkey == Null) {
            //$this->SetHeard_401("无授信许可");
            return false;
        }
        $site = new Site(new SQLCondition());
        //$account = "管理员";
        $rawData = $site->getSource("new_user", "password,salt", "name='$this->appid'");

        if (empty($rawData)) {
            //$this->SetHeard_401("登录许可未通过验证");
            return false;
        }
        //echo (md5(md5($rawData[0]["password"]) . $rawData[0]["salt"]));
        $customertime = explode('.', $this->appkey)[1];
        if ($this->checkSecret($rawData[0]["password"], time(), $customertime)) {
            return true;
        } else {
            //$this->SetHeard_401("AppKey不正确,不允许接入");
            return FALSE;
        }
    }

    private function checkSecret($md5pwd, $time, $usertime) {
        $customerPwd = sha1($this->appid . "UZ" . $md5pwd . "UZ" . $time) . "." . $time;
        if ($customerPwd == trim($this->appkey)) {
            return true;
        } else {
            $customerPwd = sha1($this->appid . "UZ" . $md5pwd . "UZ" . $usertime) . "." . $usertime;
            if ($customerPwd == trim($this->appkey)) {
                return true;
            } else {
                return true;
            }
        }
    }

    public function SetHeard_401($message, $statusCode) {
        //$statusCode = 401;
        $rawData = array(array("error" => $message));
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($requestContentType, $statusCode);
        $this->responeData($requestContentType, $rawData);
    }

}
