<?php
require_once '../config.php';
require_once '../function.php';
session_destroy();
redirect_to($config['base_url'].'admin/login.php');
