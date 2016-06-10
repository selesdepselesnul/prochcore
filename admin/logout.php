<?php
require_once '../function.php';
session_start();
session_destroy();
redirectIfNotLogin();
