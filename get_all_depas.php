<?php
require_once('includes/Depas.php');

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    Depas::get_all_depas();
}
?>