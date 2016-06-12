<?php
session_start();
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

function read_table_by_id($table, $id) {
    return _do_connection(function($connection) use($table, $id) {
        $q = mysqli_query($connection, "SELECT * FROM $table WHERE id = $id;");
        $result = mysqli_fetch_assoc($q);
        return $result;
    });
}

function exec_query($query) {
    return _do_connection(function ($connection) use($query) {
        $rows = [];
        if ($result = mysqli_query($connection, $query)) {
            while ($row = mysqli_fetch_assoc($result))
                $rows[] = $row;
            mysqli_free_result($result);
        }
        return $rows;
    });
}

function read_all_assoc_limit($table, $limit, $count) {
    return _do_connection(function ($connection) use($table, $limit, $count) {
        $rows = [];
        if ($result = mysqli_query($connection,
            "SELECT * FROM $table LIMIT $limit, $count;")) {
            while ($row = mysqli_fetch_assoc($result))
                $rows[] = $row;
            mysqli_free_result($result);
        }
        return $rows;
    });
}

function read_table($table) {
    return _do_connection(function($connection) use($table) {
        $rows = [];
        if ($result = mysqli_query($connection, "SELECT * FROM $table;")) {
            while ($row = mysqli_fetch_assoc($result))
                $rows[] = $row;
            mysqli_free_result($result);
        }
        return $rows;
    });
}

function update_table_by_id($table, $id, $fields) {
    _do_connection(function($connection) use($table, $id, $fields){
        $query="UPDATE $table SET ";
        foreach ($fields as $key => $value)
            $query .= $key .'="'.$value.'",';
        $query = rtrim($query, ',');
        $query .= "  WHERE id = $id;";
        mysqli_query($connection, $query);
    });
}

function write_table($table, $fields) {
    _do_connection(function($connection) use($table, $fields){
        $query="INSERT INTO $table ";
        $keys = "(";
        $values = "(";
        foreach ($fields as $key => $value) {
            $keys .= $key .',';
            $values .= ' "' . $value . '",';
        }
        $keys_query = $query . rtrim($keys, ',') . ' ) ';
        $values_query = 'VALUES' . rtrim($values, ',') . ' );';

        mysqli_query($connection, $keys_query . $values_query);
    });
}

function delete_table($content, $col, $val) {
    _do_connection(function($connection) use($content, $col, $val) {
        $query = 'DELETE FROM ' . $content . " WHERE $col = '$val';";
        mysqli_query($connection, $query);
    });
}

function redirectIfNotLogin() {
    if(!isset($_SESSION['login'])) {
        if(!isset($config))
            require_once 'config.php';
        redirectTo($config['base_url'] . 'admin/login.php');
    }
}

function is_login() {
    return !empty($_SESSION['login']);
}

function redirectTo($new_url) {
    echo "
        <script>
            window.location.href = '$new_url';
        </script>
    ";
}

function count_row($table) {
    return intval(exec_query("SELECT COUNT(*) AS count FROM $table")[0]['count']);
}
