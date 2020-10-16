<?php
    $db = new mysqli('localhost', 'root', '', 'sql_practice');
    if($db->error){
        die('not able to connect');
    }

    function get_all(){
        global $db;
        $data = $db->query("SELECT * from users");
        return $data->fetch_all(MYSQLI_ASSOC);
    }
?>