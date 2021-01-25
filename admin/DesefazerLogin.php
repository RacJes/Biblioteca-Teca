<?php
session_start();

unset($_SESSION['biblioteca']);
header("Location: ../index.php");

?>