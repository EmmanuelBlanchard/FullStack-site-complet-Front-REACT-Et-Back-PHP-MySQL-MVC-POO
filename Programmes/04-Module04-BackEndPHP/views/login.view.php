<?php ob_start(); ?>

<?php 
$content = ob_get_clean();
$title = "Login";
require "views/commons/template.php";
