<?php
include("../config/url.php");
session_start(); 
session_unset();
session_destroy();


header("Location: " .BASE_URL. "pages/index.php");  
?>
