<?php
$mysqli = mysqli_connect(
			"127.0.0.1",
			"root",
			"indonesiaraya",
			"uas");
$result = mysqli_query($mysqli, 'SELECT * FROM content WHERE id = 1;');
$content = mysqli_fetch_assoc($result);

function read_content($content_name) {
    global $content;
    echo $content[$content_name];
}

mysqli_close($mysqli);
