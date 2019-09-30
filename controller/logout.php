<?php
    session_start();
    unset($_SESSION["login"]);
    header("Location: ..?action=get-access");

?>