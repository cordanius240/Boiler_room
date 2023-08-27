<?php
$serverName = "KOMP1\SQLEXPRESS";
$connectionInfo = array("Database" => "graph_demo", "UID" => "sa", "PWD" => "samara80", "Encrypt" => false);
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
  die;
}
$tsql = 'SELECT  ID,Name
  FROM graph_demo.dbo.ST_ParametersT
  where EQ_ID=1';
$arr = array();
$stmt = sqlsrv_query($conn, $tsql);
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
  $arr[] = $row["ID"];
  $arr[] = iconv('windows-1251', 'utf-8', $row["Name"]);
  //array_push($arr,$row["ID"]);
  //$arr=array_push($arr,$row["ID"]);
  //$arr=array_push($arr,iconv('windows-1251', 'utf-8', $row["Name"]));
}
$asd = json_encode($arr);
echo $asd[5];
?>