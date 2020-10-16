<?php
    $db = new mysqli('localhost', 'root', '', 'sql_practice');
    if($db->error){
        die('not able to connect');
    }
?>