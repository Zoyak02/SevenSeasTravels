<?php 
  $con = mysqli_connect("localhost", "root", "", "crud");

  if(mysqli_connect_errno()){
    die("Cannot Connect to the database".mysqli_connect_error());
  }

  define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/BIT210/uploads/");

  define("FETCH_SRC","http://127.0.0.1/BIT210/uploads/");


?>