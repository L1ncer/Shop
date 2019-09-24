<?php
session_start();
require 'includes/rb.php';
R::setup( 'mysql:host=127.0.0.1;dbname=shop',
        'root', '' );
?>