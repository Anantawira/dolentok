<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['status']);
session_destroy();

header("Location: ../index.php");
exit;
?>