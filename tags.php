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

function _read_all_assoc($content) {
    return _do_connection(function($connection) use($content) {
        $rows = [];
        if ($result = mysqli_query($connection, "SELECT * FROM $content;")) {
            while ($row = mysqli_fetch_assoc($result))
                $rows[] = $row;
            mysqli_free_result($result);
        }
        return $rows;
    });
}

$content['home'] = _read_assoc('Home');
$content['about'] = _read_assoc('About');
$content['contact'] = _read_assoc('Contact');
$content['homeweapon'] = _read_all_assoc('HomeWeapon');

function update_content($content, $fields) {
    _do_connection(function($connection) use($content, $fields){
        $query="UPDATE $content SET ";
        foreach ($fields as $key => $value)
            $query .= $key .'="'.$value.'",';
        $query = rtrim($query, ',');
        $query .= '  WHERE id = 1;';
        mysqli_query($connection, $query);
    });
}

function write_content($content, $fields) {
    _do_connection(function($connection) use($content, $fields){
        $query="INSERT INTO $content ";
        $keys = "(";
        $values = "(";
        foreach ($fields as $key => $value) {
            $keys .= $key .',';
            $values .= ' "' . $value . '",';
        }
        $keys_query = $query . rtrim($keys, ',') . ' ) ';
        $values_query = 'VALUES' . rtrim($values, ',') . ' );';

        echo $keys_query . $values_query;
        mysqli_query($connection, $keys_query . $values_query);
    });
}

function delete_home_weapon($col, $val) {
    _do_connection(function($connection) use($col, $val) {
        $query = "DELETE FROM HomeWeapon WHERE $col = '$val';";
        mysqli_query($connection, $query);
    });
}
