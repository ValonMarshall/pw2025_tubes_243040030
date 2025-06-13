<?php
session_start ();
$_SESSION = [];
session_unset ();
session_destroy ();

//hapus cookie ketika logout
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);


header ("Location: ../auth/login.php");
exit;

?>