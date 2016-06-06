<?php
$_mysqli = mysqli_connect(
			"127.0.0.1",
			"root",
			"indonesiaraya",
			"uas");

function _read_assoc($content) {
    global $_mysqli;
    $q = mysqli_query($_mysqli, "SELECT * FROM $content WHERE id = 1;");
    return mysqli_fetch_assoc($q);
}

$_content['home'] = _read_assoc('Home');
$_content['about'] = _read_assoc('About');
$_content['contact'] = _read_assoc('Contact');

function read_content($content, $section) {
    global $_content;
    echo $_content[$content][$section];
}

mysqli_close($_mysqli);
