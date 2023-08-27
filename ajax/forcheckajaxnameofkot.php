<?php
$serverName = "KOMP1\SQLEXPRESS";
$connectionInfo = array("Database" => "graph_demo", "UID" => "sa", "PWD" => "samara80", "CharacterSet" => "UTF-8", "Encrypt" => false);
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
  die;
}
$tsql = 'SELECT Name
  FROM graph_demo.dbo.NB_Equipment
  where EQ_ID=' . $_POST["idofkotl"] . ';';
$arr = array();
$stmt = sqlsrv_query($conn, $tsql);
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
  $arr[] = $row["Name"];
}
echo json_encode($arr);
?>