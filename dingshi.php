<?php

       $myfile = "dingshi.txt";
       $txt = date("Y-m-d H:i:s");
       file_put_contents($myfile, $txt, FILE_APPEND);
       $txt = "\r\n";
       file_put_contents($myfile, $txt, FILE_APPEND);
?>
