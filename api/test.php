<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>hello</title>
        <script src="js/SHA1.js" type="text/javascript"></script>
        <script type="text/javascript">
            window.onload = function () {
                //var now = parseInt(<?= microtime(true) * 1000 ?>);
                var now = parseInt(Date.now() / 1000);
//                debugger;
//                debugger;
                var s = SHA1("A6968565094002" + "UZ" + "62FB16B2-0ED6-B460-1F60-EB61954C823B" + "UZ" + now) + "." + now;
                document.getElementById('one').innerHTML = s + "<br/>" + now;

            };
        </script>

    </head>
    <body>
        <div id="one"></div>
        <hr>
        <?php
        require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/SqlCondition.php");
        require_once ($_SERVER['DOCUMENT_ROOT'] . "/version/v1.0/Site.php");

        $site = new Site(new SQLCondition());
        var_dump($site->getSource("new_customer", "name,crm_phonenumber", "1=1"));


        //$time = floor(microtime(true) * 1000);
        $time = time(); //通过Cliet 端传过来的时间戳来计算SHA1值 0a57e4cb7f7df3a427c613e4fe0352468db32b09.1511187893
        echo $time . "<br>";
        echo sha1("A6968565094002" . "UZ" . "62FB16B2-0ED6-B460-1F60-EB61954C823B" . "UZ" . $time) . "." . $time;
        echo '<br>d134edd5316b1120f07f826caebce1dd<br>';
        echo md5(md5(trim('Pa$$w0rd')) . '9f6a');
        ?>
    </body>
</html>
