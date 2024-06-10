<?php

//Il execute pas l'index et jsp pk
echo 'SESSION PAS DEMARREE';
session_start();
echo 'SESSION DEMARREE';
$_SESSION["login"] = "vide";
header('Location: app/router/router1.php?action=truc');

?>