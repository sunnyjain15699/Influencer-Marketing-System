<?php

session_start();
session_destroy();

header('location:brand_login.php');

?>