<?php
function _read_assoc($content) {
    $mysqli = mysqli_connect(
    			"127.0.0.1",
    			"root",
    			"indonesiaraya",
    			"uas");
    $q = mysqli_query($mysqli, "SELECT * FROM $content WHERE id = 1;");
    $assoc = mysqli_fetch_assoc($q);
    mysqli_close($mysqli);
    return $assoc;
}

$_content['home'] = _read_assoc('Home');
$_content['about'] = _read_assoc('About');
$_content['contact'] = _read_assoc('Contact');

function read_content($content, $section) {
    global $_content;
    echo $_content[$content][$section];
}

function update_content($content, $fields) {
    $mysqli = mysqli_connect(
    			"127.0.0.1",
    			"root",
    			"indonesiaraya",
    			"uas");
    $query="UPDATE $content SET ";
    foreach ($fields as $key => $value)
        $query .= $key ."='".$value."',";
    $query = rtrim($query, ',');
    $query .= ' WHERE id = 1;';
    mysqli_query($mysqli, $query);
    mysqli_close($mysqli);
}
