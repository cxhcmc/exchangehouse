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
                var now = parseInt(Date.now() / 1000);
                var s = SHA1("A6968565094002" + "UZ" + "62FB16B2-0ED6-B460-1F60-EB61954C823B" + "UZ" + now) + "." + now;
                document.getElementById('one').innerHTML = s;

            };
        </script>

    </head>
    <body>
        <div id="one"></div>
        <?php
        $string = "A6968565094002" . "UZ" . "62FB16B2-0ED6-B460-1F60-EB61954C823B" . "UZ" . time() . "1234." . time();
        $string2 = "A6968565094002" . "UZ" . "62FB16B2-0ED6-B460-1F60-EB61954C823B" . "UZ" . time() . "1234." . time();
        $arr = explode('UZ', $string);

        //unset($arr[0]);
        //unset($arr[1]);
        //$string = implode('UZ', $arr[2]);
        //  $text = substr($arr[2], 0, 10);
//        $xiaoshu = explode('.', microtime(true))[1];
//
//        echo time();
        //echo sha1($arr[0] . "UZ" . $arr[1] . "UZ") . "." . $text;
        //($string2,$text,)
        echo sha1("A6968565094002" . "UZ" . "62FB16B2-0ED6-B460-1F60-EB61954C823B" . "UZ" . time()) . "." . time();
        ?>
    </body>
</html>
