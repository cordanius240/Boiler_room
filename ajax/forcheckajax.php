<?php
$serverName = "KOMP1\SQLEXPRESS";
$connectionInfo = array("Database" => "graph_demo", "UID" => "sa", "PWD" => "samara80", "CharacterSet" => "UTF-8", "Encrypt" => false);
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
  die;
}
$tsql = 'SELECT  ARCnumber,Name
  FROM graph_demo.dbo.ST_ParametersT
  where EQ_ID=' . $_POST['idofkotl'] . ' and PType=1';
$arr = array();
$stmt = sqlsrv_query($conn, $tsql);
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
  $arr[] = $row["ARCnumber"];
  $arr[] = $row["Name"];
}
echo json_encode($arr);
?>