<?php

function _do_connection($mysql_action) {
    $mysqli = mysqli_connect(
                "127.0.0.1",
                "root",
                "indonesiaraya",
                "uas");
    $result = $mysql_action($mysqli);
    mysqli_close($mysqli);
    return $result;
}

function _read_assoc($content) {
    return _do_connection(function($connection) use($content){
        $q = mysqli_query($connection, "SELECT * FROM $content WHERE id = 1;");
        $result = mysqli_fetch_assoc($q);
        return $result;
    });
}

$content['home'] = _read_assoc('Home');
$content['about'] = _read_assoc('About');
$content['contact'] = _read_assoc('Contact');

function update_content($content, $fields) {
    _do_connection(function($connection) use($content, $fields){
        $query="UPDATE $content SET ";
        foreach ($fields as $key => $value)
            $query .= $key ."='".$value."',";
        $query = rtrim($query, ',');
        $query .= ' WHERE id = 1;';
        mysqli_query($connection, $query);
    });
}
