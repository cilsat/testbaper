<?php
require_once 'syssession.php';
session_start();
if (session_destroy()) {
    header("location: index.php");
}
?>
