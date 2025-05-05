<?php
    session_start();
    session_destroy();
    header('Location: /ARSARO_CITAS/Cliente/index.php');
    exit();
?>