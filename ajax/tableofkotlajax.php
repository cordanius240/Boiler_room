<?php

$serverName = "KOMP1\SQLEXPRESS";
$connectionInfo = array("Database" => "graph_demo", "UID" => "sa", "PWD" => "samara80", "CharacterSet" => "UTF-8", "Encrypt" => false);
$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
  die(print_r(sqlsrv_errors(), true));
}

$tsql = 'SELECT id,Name
  FROM graph_demo.dbo.ST_EquipmentR Where EQ_Type=1';
$arr = array();
$stmt = sqlsrv_query($conn, $tsql);
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
  $arr[] = $row["id"];
  $arr[] = $row["Name"];
}
echo json_encode($arr);
?>