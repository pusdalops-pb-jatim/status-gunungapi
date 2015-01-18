<?php

function GetServerStatus($site, $port)
{
$status = array("SERVER OFFLINE", "SERVER ONLINE");
$fp = fsockopen($site, $port, $errno, $errstr, 2);
if (!$fp) {
    return $status[0];
} else 
  { return $status[1];}
}

$status =  GetServerStatus('http://pvmbg.bgl.esdm.go.id',80);

//echo $status."<br>";

$homepage = file_get_contents('http://pvmbg.bgl.esdm.go.id/');

$x = strpos($homepage, "Status Gunungapi Diatas Normal")+36;

$homepage = substr($homepage, $x);

$y = strpos($homepage, "</table>");

$homepage = substr($homepage, 1, $y);
$homepage = substr($homepage, 0, -1);

$homepage = str_replace("border=\"1\"","border=\"0\" cellspacing=\"5\"",$homepage);
$homepage = str_replace("width=\"310\"","width=\"400\"",$homepage);
echo $homepage;


?>