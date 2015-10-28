<?php
$dbhost = "i9yueekhr9.database.windows.net";
$db = "Juliet";
$user = "TSI";
$password = "SistemasInternet123";
$dsn = "Driver={SQL Server};Server=$dbhost;Port=1433;Database=$db;";
               
$connect = odbc_connect($dsn,$user,$password);



?>