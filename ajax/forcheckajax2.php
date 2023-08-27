<?php
$serverName = "KOMP1\SQLEXPRESS";
$connectionInfo = array("Database" => "graph_demo", "UID" => "sa", "PWD" => "samara80", "CharacterSet" => "UTF-8", "Encrypt" => false);
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
  die;
}
$arr = array();
if (isset($_POST['stroka']) and $_POST['stroka'] != "0") {
  $tsql = 'select [FieldName],[Name] from graph_demo.[dbo].[ST_ParTemplate] a inner join graph_demo.[dbo].[ST_ParametersT] b on b.[ARCnumber] = a.id
  where a.eq_id = 1 and b.ARCnumber in (' . $_POST['stroka'] . ') and b.eq_id=' . $_POST["idofkotl"] . ';'; //9 3 1 1 3 9 
  $stmt = sqlsrv_query($conn, $tsql);
  $idnum = $_POST["idofkotl"];
  if ($_POST['timedel'] == 'min') {

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
      $tsql1 = 'select ' . $row["FieldName"] . ',T from graph_demo.dbo.ArcAnalog' . $idnum . '  where T>=\'' . $_POST['firsdata'] . '\' and T<=\'' . $_POST['secnddata'] . '\' order by T';

      $stmt1 = sqlsrv_query($conn, $tsql1);
      while ($row1 = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC)) {
        $arr[] = $row1[$row["FieldName"]];
        $time = $row1["T"]->format('Y-m-d H:i:s');
        $arr[] = $time;
      }
      $arr[] = "!";
      $arr[] = $row["Name"];
      $arr[] = "firsty";
    }

  }
  if ($_POST['timedel'] == 'hour') {

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
      $tsql1 = 'select avg(' . $row["FieldName"] . ') ' . $row["FieldName"] . ',[dbo].[CutDatetoHour](T) T from dbo.ArcAnalog' . $idnum . '  where T>=\'' . $_POST['firsdata'] . '\' and T<=\'' . $_POST['secnddata'] . '\' group by graph_demo.[dbo].[CutDatetoHour](T) order by graph_demo.[dbo].[CutDatetoHour](T)';

      $stmt1 = sqlsrv_query($conn, $tsql1);
      while ($row1 = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC)) {
        $arr[] = $row1[$row["FieldName"]];
        $time = $row1["T"]->format('Y-m-d H:i:s');
        $arr[] = $time;
      }
      $arr[] = "!";
      $arr[] = $row["Name"];
      $arr[] = "firsty";
    }
  } else if ($_POST['timedel'] == 'day') {

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
      $tsql1 = 'select avg(' . $row["FieldName"] . ') ' . $row["FieldName"] . ',graph_demo.[dbo].[CutDatetoDay](T) T from graph_demo.dbo.ArcAnalog' . $idnum . '  where T>=\'' . $_POST['firsdata'] . '\' and T<=\'' . $_POST['secnddata'] . '\' group by graph_demo.[dbo].[CutDatetoDay](T) order by graph_demo.[dbo].[CutDatetoDay](T)';
      $stmt1 = sqlsrv_query($conn, $tsql1);
      while ($row1 = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC)) {
        $arr[] = $row1[$row["FieldName"]];
        $time = $row1["T"]->format('Y-m-d H:i:s');
        $arr[] = $time;
      }
      $arr[] = "!";
      $arr[] = $row["Name"];
      $arr[] = "firsty";
    }

  } else if ($_POST['timedel'] == 'month') {

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
      $tsql1 = 'select avg(' . $row["FieldName"] . ') ' . $row["FieldName"] . ',graph_demo.[dbo].[CutDatetoMonth](T) T from graph_demo.dbo.ArcAnalog' . $idnum . '  where T>=\'' . $_POST['firsdata'] . '\' and T<=\'' . $_POST['secnddata'] . '\' group by graph_demo.[dbo].[CutDatetoMonth](T) order by graph_demo.[dbo].[CutDatetoMonth](T)';
      $stmt1 = sqlsrv_query($conn, $tsql1);
      while ($row1 = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC)) {
        $arr[] = $row1[$row["FieldName"]];
        $time = $row1["T"]->format('Y-m-d H:i:s');
        $arr[] = $time;
      }
      $arr[] = "!";
      $arr[] = $row["Name"];
      $arr[] = "firsty";
    }

  }

}

if (isset($_POST['stroka3']) and $_POST['stroka3'] != "0") {

  $tsql2 = 'select [FieldName],[Name] from graph_demo.[dbo].[ST_ParTemplate] a inner join graph_demo.[dbo].[ST_ParametersT] b on b.[ARCnumber] = a.id
  where a.eq_id = 1 and b.ARCnumber in (' . $_POST['stroka3'] . ') and b.eq_id=' . $_POST["idofkotl"] . ';'; //9 3 1 1 3 9 
  $stmt2 = sqlsrv_query($conn, $tsql2);
  $idnum = $_POST["idofkotl"];
  if ($_POST['timedel'] == 'min') {

    while ($row2 = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
      $tsql3 = 'select ' . $row2["FieldName"] . ',T from graph_demo.[dbo].ArcAnalog' . $idnum . '  where T>=\'' . $_POST['firsdata'] . '\' and T<=\'' . $_POST['secnddata'] . '\' order by T';
      $stmt3 = sqlsrv_query($conn, $tsql3);
      while ($row3 = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)) {
        $arr[] = $row3[$row2["FieldName"]];
        $time = $row3["T"]->format('Y-m-d H:i:s');
        $arr[] = $time;
      }
      $arr[] = "!";
      $arr[] = $row2["Name"];
      $arr[] = "secondy";
    }

  }
  if ($_POST['timedel'] == 'hour') {

    while ($row2 = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
      $tsql3 = 'select avg(' . $row2["FieldName"] . ') ' . $row2["FieldName"] . ',graph_demo.[dbo].[CutDatetoHour](T) T from graph_demo.dbo.ArcAnalog' . $idnum . '  where T>=\'' . $_POST['firsdata'] . '\' and T<=\'' . $_POST['secnddata'] . '\' group by graph_demo.[dbo].[CutDatetoHour](T) order by graph_demo.[dbo].[CutDatetoHour](T)';

      $stmt3 = sqlsrv_query($conn, $tsql3);
      while ($row3 = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)) {
        $arr[] = $row3[$row2["FieldName"]];
        $time = $row3["T"]->format('Y-m-d H:i:s');
        $arr[] = $time;
      }
      $arr[] = "!";
      $arr[] = $row2["Name"];
      $arr[] = "secondy";
    }

  } else if ($_POST['timedel'] == 'day') {

    while ($row2 = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
      $tsql3 = 'select avg(' . $row2["FieldName"] . ') ' . $row2["FieldName"] . ',graph_demo.[dbo].[CutDatetoDay](T) T from graph_demo.dbo.ArcAnalog' . $idnum . '  where T>=\'' . $_POST['firsdata'] . '\' and T<=\'' . $_POST['secnddata'] . '\' group by graph_demo.[dbo].[CutDatetoDay](T) order by graph_demo.[dbo].[CutDatetoDay](T)';
      $stmt3 = sqlsrv_query($conn, $tsql3);
      while ($row3 = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)) {
        $arr[] = $row3[$row2["FieldName"]];
        $time = $row3["T"]->format('Y-m-d H:i:s');
        $arr[] = $time;
      }
      $arr[] = "!";
      $arr[] = $row2["Name"];
      $arr[] = "secondy";
    }

  } else if ($_POST['timedel'] == 'month') {

    while ($row2 = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
      $tsql3 = 'select avg(' . $row2["FieldName"] . ') ' . $row2["FieldName"] . ',graph_demo.[dbo].[CutDatetoMonth](T) T from graph_demo.dbo.ArcAnalog' . $idnum . '  where T>=\'' . $_POST['firsdata'] . '\' and T<=\'' . $_POST['secnddata'] . '\' group by graph_demo.[dbo].[CutDatetoMonth](T) order by graph_demo.[dbo].[CutDatetoMonth](T)';
      $stmt3 = sqlsrv_query($conn, $tsql3);
      while ($row3 = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)) {
        $arr[] = $row3[$row2["FieldName"]];
        $time = $row3["T"]->format('Y-m-d H:i:s');
        $arr[] = $time;
      }
      $arr[] = "!";
      $arr[] = $row2["Name"];
      $arr[] = "secondy";
    }

  }

}
if (isset($_POST['stroka4']) and $_POST['stroka4'] != "0") {

  $tsql4 = 'select [FieldName],[Name] from graph_demo.[dbo].[ST_ParTemplate] a inner join graph_demo.[dbo].[ST_ParametersT] b on b.[ARCnumber] = a.id
  where a.eq_id = 1 and b.ARCnumber in (' . $_POST['stroka4'] . ') and b.eq_id=' . $_POST["idofkotl"] . ';'; //9 3 1 1 3 9 
  $stmt4 = sqlsrv_query($conn, $tsql4);
  $idnum = $_POST["idofkotl"];
  if ($_POST['timedel'] == 'min') {

    while ($row4 = sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC)) {
      $tsql5 = 'select ' . $row4["FieldName"] . ',T from graph_demo.dbo.ArcAnalog' . $idnum . '  where T>=\'' . $_POST['firsdata'] . '\' and T<=\'' . $_POST['secnddata'] . '\' order by T';
      $stmt5 = sqlsrv_query($conn, $tsql5);
      while ($row5 = sqlsrv_fetch_array($stmt5, SQLSRV_FETCH_ASSOC)) {
        $arr[] = $row5[$row4["FieldName"]];
        $time = $row5["T"]->format('Y-m-d H:i:s');
        $arr[] = $time;
      }
      $arr[] = "!";
      $arr[] = $row4["Name"];
      $arr[] = "thirdy";
    }

  }
  if ($_POST['timedel'] == 'hour') {
    while ($row4 = sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC)) {
      $tsql5 = 'select avg(' . $row4["FieldName"] . ') ' . $row4["FieldName"] . ',graph_demo.[dbo].[CutDatetoHour](T) T from graph_demo.dbo.ArcAnalog' . $idnum . '  where T>=\'' . $_POST['firsdata'] . '\' and T<=\'' . $_POST['secnddata'] . '\' group by graph_demo.[dbo].[CutDatetoHour](T) order by graph_demo.[dbo].[CutDatetoHour](T)';
      $stmt5 = sqlsrv_query($conn, $tsql5);
      while ($row5 = sqlsrv_fetch_array($stmt5, SQLSRV_FETCH_ASSOC)) {
        $arr[] = $row5[$row4["FieldName"]];
        $time = $row5["T"]->format('Y-m-d H:i:s');
        $arr[] = $time;
      }
      $arr[] = "!";
      $arr[] = $row4["Name"];
      $arr[] = "thirdy";
    }

  } else if ($_POST['timedel'] == 'day') {

    while ($row4 = sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC)) {
      $tsql5 = 'select avg(' . $row4["FieldName"] . ') ' . $row4["FieldName"] . ',graph_demo.[dbo].[CutDatetoDay](T) T from graph_demo.dbo.ArcAnalog' . $idnum . '  where T>=\'' . $_POST['firsdata'] . '\' and T<=\'' . $_POST['secnddata'] . '\' group by graph_demo.[dbo].[CutDatetoDay](T) order by graph_demo.[dbo].[CutDatetoDay](T)';
      $stmt5 = sqlsrv_query($conn, $tsql5);
      while ($row5 = sqlsrv_fetch_array($stmt5, SQLSRV_FETCH_ASSOC)) {
        $arr[] = $row5[$row4["FieldName"]];
        $time = $row5["T"]->format('Y-m-d H:i:s');
        $arr[] = $time;
      }
      $arr[] = "!";
      $arr[] = $row4["Name"];
      $arr[] = "thirdy";
    }

  } else if ($_POST['timedel'] == 'month') {

    while ($row4 = sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC)) {
      $tsql5 = 'select avg(' . $row4["FieldName"] . ') ' . $row4["FieldName"] . ',graph_demo.[dbo].[CutDatetoMonth](T) T from graph_demo.dbo.ArcAnalog' . $idnum . '  where T>=\'' . $_POST['firsdata'] . '\' and T<=\'' . $_POST['secnddata'] . '\' group by graph_demo.[dbo].[CutDatetoMonth](T) order by graph_demo.[dbo].[CutDatetoMonth](T)';
      $stmt5 = sqlsrv_query($conn, $tsql5);
      while ($row5 = sqlsrv_fetch_array($stmt5, SQLSRV_FETCH_ASSOC)) {
        $arr[] = $row5[$row4["FieldName"]];
        $time = $row5["T"]->format('Y-m-d H:i:s');
        $arr[] = $time;
      }
      $arr[] = "!";
      $arr[] = $row4["Name"];
      $arr[] = "thirdy";
    }

  }

}
echo json_encode($arr);
//1 , 2 , 3
?>