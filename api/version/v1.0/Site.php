<?php

/**
 * 数据源类
 */
class Site {

    private $SQL;

    /**
     * 
     * @param type $SQL 需要执行的数据库对象
     */
    function __construct($SQL) {
        $this->SQL = $SQL;
    }

    /**
     * 
     * @param type $SQLStr SQL语句字符串
     * @return type 数据库执行结果
     * @throws Exception 数据库执行异常
     */
    private function getSQLRequest($SQLStr) {
        try {
            $con = $this->SQL->CreateSQLCon();
            if (!$con) {
                throw new Exception("SQL对象创建失败,语句\$SQL->CreateSQLCon()对象为空");
            } else {
                $result = $con->query($SQLStr);
                return $result;
            }
        } catch (Exception $exc) {
            die("执行SQL语句失败: " . $exc->getTraceAsString());
        } finally {
            $this->SQL->conn->close();
        }
    }

    /**
     * 
     * @param type $tablename 表名
     * @param type $field 查询字段
     * @param type $condition 查询条件
     * @return type 数组格式数据
     */
    public function getSource($tablename, $field, $condition) {
        try {
            if ($tablename != NULL || $field != NULL) {
                $result = $this->getSQLRequest("SELECT $field FROM $tablename WHERE TRUE AND $condition");
                $arr = [];
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { // 输出数据
                        $arr[] = $row; //  echo "手机: " . $row["crm_phonenumber"] . "   借款人: " . $row["name"] . " " . "<br>";
                    }
                }
                return $arr; //return json_encode($arr);
            } else {
                throw new Exception("缺少查询必要参数");
            }
        } catch (Exception $exc) {
            die("运行中断,异常原因: " . $exc->getTraceAsString());
        }
    }

//    public function getSite($id) {
//		$site = array($id => ($this->sites[$id]) ? $this->sites[$id] : $this->sites[1]);
//		return $site;
//    }
}
