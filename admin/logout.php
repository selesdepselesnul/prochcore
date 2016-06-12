<?php
require_once '../config.php';
require_once '../function.php';
session_destroy();
redirectTo($config['base_url'].'admin/login.php');
