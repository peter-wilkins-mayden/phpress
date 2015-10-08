<?php

if($live){
	include "includes/database-000host.inc";

}
else{
	include "includes/database-local.inc";
}
$db = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
      if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
}
