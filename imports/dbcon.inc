<?php
    $dbhost = 'localhost';
    $dbname = 'owngalaxy';
    $dbuser = 'root';
    $dbpass = '';

    $con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if(!$con) {
        die('Could not connect to the database !'.mysqli_connect_error($con));
    }
?>
