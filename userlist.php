<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Userlist</title>
        <link rel="stylesheet" type="text/css" href="/StyleSheet.css" />
    </head>
    <body>
        <p id="title" >
            Userlist
        </p>
        <table>
        <?php
            require_once "config.php";

            $result = $mysqli->query('SELECT `id`,`username` FROM `userdata`');

            while($row = $result -> fetch_assoc())
            {
                echo "<tr><td>ID: ".$row["id"]."</td><td>Username: ".$row["username"]."</td></tr>";
            }
        ?>        
        </table>
    </body>
</html>
