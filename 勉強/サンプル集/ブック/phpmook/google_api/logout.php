<?php
session_start();
unset($_SESSION['ACCESS_TOKEN']);
header('Location: index.php');
?>