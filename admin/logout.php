<?php
require_once '../tags.php';
session_start();
session_destroy();
redirectIfNotLogin();
