<?php
    $mysql_data = array(
        "host" => "", 
        "database" => "", 
        "username" => "", 
        "password" => ""
    );

    $mysqli = new mysqli($mysql_data["host"], $mysql_data["username"], $mysql_data["password"], $mysql_data["database"]);
    if($mysqli -> connect_error)
    {
        die('<span style="color:red;">'.$mysqli -> connect_error.'</span>');
    }

?>