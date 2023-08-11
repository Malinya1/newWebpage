<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='signupforms';


$conn=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
if($conn){
    echo "connection successful";
    }else{
        die(mysqli_error($conn));
    }


?>