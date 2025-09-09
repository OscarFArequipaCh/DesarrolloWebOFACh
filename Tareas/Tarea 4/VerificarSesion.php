<?php
if (!isset($_SESSION["email"]))
{
    echo "acceso no autorizado"
    ?>
    <meta http-equiv="refresh" content="3;url=login.html">
    <?php
    die();
}
?>