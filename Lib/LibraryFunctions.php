<?php
    function consoleLog($logMsg){
        echo "<script>console.log('log from PHP: $logMsg')</script>";
    }

    function redirect(string $url){
        header('Location: ' . $url);
        exit();
    }
?>