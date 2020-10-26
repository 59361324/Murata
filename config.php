<?php 
    define('DB_SERVER','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','smartpower_test');

    $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

    if($conn === false){
        die("ERROR : Could not conect. " . mysqli_connect_error());
    }
?>