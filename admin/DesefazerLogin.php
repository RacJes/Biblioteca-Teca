<?php
session_start();

unset($_SESSION['clinica']);
unset($_SESSION['privilegio']);
header("Location: ../index.php");

?>