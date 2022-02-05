<?php

  $host = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "sagor";
   $connection = mysqli_connect($host,$dbuser,$dbpass,$dbname);
   if($connection==false){
   	echo "db connection problem";
   }
?>
