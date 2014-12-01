<?php
session_start();

if (isset($_COOKIE['loggedinjgdqt'])) {
	echo '<script language="javascript">';
    echo 'alert("Deleted cookie.")';
    echo '</script>';
    unset($_COOKIE['loggedinjgdqt']);
    setcookie('loggedinjgdqt','',time() - 36000,"/"); // set cookie expire in x sec in past
    //header("Location: bitches.php");
}

$_SESSION["loggedout"] = true;
header("Location: login.php");
?>