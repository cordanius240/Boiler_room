<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8">
  <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css//forcheck.css">
  <title></title>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://yandex.st/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <style>
    .tasks__list {
      display: inline-block;
    }

    .tasks__item {
      margin-bottom: 10px;
      padding: 5px;
      text-align: center;
      cursor: move;
      background-color: white;

      transition: background-color 0.5s;
    }

    #tasks__lists1,
    #tasks__list2,
    #tasks__list3,
    #tasks__list4 {
      border: thick double #32a1ce;
      min-height: 299px;
      width: 90%;
      max-width: 90%;
      list-style-type: none;
      margin: 0;
      padding: 5px 0 0 0;
      float: left;
      margin-right: 10px;
    }

    #tasks__lists1 li,
    #tasks__list2 li,
    #tasks__list3 li,
    #tasks__list4 li {
      max-width: 90%;
      margin: 0 5px 5px 5px;
      padding: 10px;
      word-break: break-all;
    }

    .scroll-table {
      display: inline-block;
    }

    h1 {
      text-align: center;
    }

    .lists_div {
      max-width: 99%;
    }

    .forbuttonandkotl {
      display: inline-block;
    }

    .forbuttonandkotl1 {
      display: inline-block;
    }

    .forbuttonandkotl2 {
      display: inline-block;
    }
  </style>
</head>

<script>
  $(function () {
    $("#tasks__lists1, #tasks__list2, #tasks__list3, #tasks__list4").sortable({
      connectWith: ".tasks__list"
    }).disableSelection();
  });
  let datasetforgraph2 = [];
  let colorsforgrapg = ["red", "blue", "green", "black"];
  let cancelfirsttime;
  let cancelsecondtime;
  let cancellist1;
  let cancellist2;
  let cancellist3;
  let canceltimescale;
  let cancelnouse;
  <?php
  if (isset($_GET['idkotl'])) {
    echo ('let idofkotl=' . $_GET["idkotl"] . ';');
  } else {
    header("Location: ../otchet/tableofkotl.php");
  }
  ?>
</script>

<body>
  <div class="forbuttonandkotl">
    <div class="forbuttonandkotl1">
      <button class="popup-open" href="#" id='roflan'>Открыть меню для построения графика</button>
    </div>
    <div class="forbuttonandkotl2">
      <p id='kotlname'></p>
    </div>
  </div>
  <div class="popup-fade">
    <div class="popup">
      <div class="lists_div">
        <div class="scroll-table">
          <h1>Параметры</h1>
          <div class="scroll-table-body" id="sqlweq">
            <ul class="tasks__list" id="tasks__lists1">
            </ul>
          </div>
        </div>

        <div class="scroll-table">
          <h1>ось Y </h1>
          <div class="scroll-table-body" id="sqlweq">

            <ul class="tasks__list" id="tasks__list2">
            </ul>
          </div>
        </div>
        <div class="scroll-table">
          <h1>ось Y1 </h1>
          <div class="scroll-table-body" id="sqlweq">

            <ul class="tasks__list" id="tasks__list3">
            </ul>
          </div>
        </div>
        <div class="scroll-table">
          <h1>ось Y2 </h1>
          <div class="scroll-table-body" id="sqlweq">

            <ul class="tasks__list" id="tasks__list4">
            </ul>
          </div>
        </div>
      </div>
      <div class="timeparam">
        <div class="f1ist">
          <a class="tex">Начало выбранного промежутка вермени</a>
          <input type="datetime-local" id="pervoe" class="texta">
          <a class="tex">Конец выбранного промежутка вермени</a>
          <input type="datetime-local" id="vtoroe" class="texta">
        </div>
        <div>
          <input type="radio" name="delenievremy" checked="true" id='min'>
          <label for="min">Минуты</label>
        </div>
        <div>
          <input type="radio" name="delenievremy" id='hour'>
          <label for="hour">Часы</label>
        </div>
        <div>
          <input type="radio" name="delenievremy" id='day'>
          <label for="day">Дни</label>
        </div>
        <div>
          <input type="radio" name="delenievremy" id='month'>
          <label for="month">Месяца</label>
        </div>
        <button id="graficforcheck" class="timeforcheckbutt1" onclick="fortimeajax()">Построить график</button>
      </div>
      <button class="popup-close">закрыть</button>
    </div>
  </div>
  <script>
    function fortimescale() {
      today = new Date();
      hourplus = new Date();
      hourplus.setDate(hourplus.getDate() - 1);
      hour1 = hourplus.getHours();
      year1 = hourplus.getFullYear();
      month1 = hourplus.getMonth();
      day1 = hourplus.getDate();
      sec1 = hourplus.getMinutes();
      hour = today.getHours();
      year = today.getFullYear();
      month = today.getMonth();
      day = today.getDate();
      sec = today.getMinutes();
      if (day < 10) {
        day = "0" + day;
      }
      if (day1 < 10) {
        day1 = "0" + day1;
      }
      month++;
      month1++;
      if (month < 10) {
        month = "0" + month;
      }
      if (month1 < 10) {
        month1 = "0" + month1;
      }
      if (hour < 10) {
        hour = "0" + hour;
      }
      if (hour1 < 10) {
        hour1 = "0" + hour1;
      }
      if (sec < 10) {
        sec = "0" + sec;
      }
      if (sec1 < 10) {
        sec1 = "0" + sec1;
      }
      str = year + "-" + month + "-" + day + "T" + hour + ":" + sec;
      str1 = year1 + "-" + month1 + "-" + day1 + "T" + hour1 + ":" + sec1;
      document.getElementById("vtoroe").value = str;
      document.getElementById("pervoe").value = str1;
    }
    Date.prototype.toDateInputValue = (function () {
      var local = new Date(this);
      local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
      return local.toJSON().slice(0, 10);
    });
    $(document).ready(function () {
      $('#datePicker').val(new Date().toDateInputValue());
    });
    document.getElementById("pervoe").value = new Date().toDateInputValue();
    var vtoroevremya = document.getElementById("vtoroe");
    todaydata = new Date();
    todaydata.setHours(todaydata.getHours() - 1);
    vtoroevremya.value = todaydata.toDateInputValue();

    $(document).ready(function ($) {
      $('.popup-close').click(function () {
        $(this).parents('.popup-fade').fadeOut();
        cancelbutt();
        return false;
      });
      $(document).keydown(function (e) {
        if (e.keyCode == 27) {
          e.stopPropagation();
          $('.popup-fade').fadeOut();
          cancelbutt();
        }
      });

      $('.popup-fade').click(function (e) {
        if ($(e.target).closest('.popup').length == 0) {
          $(this).fadeOut();
          cancelbutt();
        }
      });

    });
    $('.popup-open').click(function () {
      $('.popup-fade').fadeIn();
      var listnouse = document.getElementById("tasks__lists1");
      var linouse = listnouse.querySelectorAll('li');
      cancelnouse = linouse;
      return false;
    });

  </script>
  <div id="divforcanvas">
    <canvas id="myChart"></canvas>
  </div>

  <body>
  </body>

  <script>
    var curr_li;
    fortimescale();
    function forchecknameofkotl() {
      $.ajax({
        url: "ajax/forcheckajaxnameofkot.php",
        type: "POST",
        data: { 'idofkotl': idofkotl },
        dataType: 'json',
        success: function (data) {
          var botofkotlname = document.getElementById('kotlname');
          botofkotlname.innerHTML = data;
        }
      });
    }
    forchecknameofkotl();
    function insertAfter(newNode, existingNode) {
      existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
    }
    function forcheckid1() {
      var check = document.getElementsByName('delenievremy');
      for (var i = 0, len = check.length; i < len; ++i)
        if (check[i].checked)
          var checkid = check[i].id;
      $.ajax({
        url: "ajax/forcheckajax.php",
        type: "POST",
        data: { 'idofkotl': idofkotl },
        dataType: 'json',
        success: function (data) {
          var list1 = document.getElementById("tasks__lists1");
          while (list1.firstChild) {
            list1.removeChild(list1.firstChild);
          }
          for (let i = 0; i < data.length; i = i + 2) {
            var cr = document.createElement('li');
            cr.innerHTML = `${data[i + 1]}`;
            cr.id = data[i];
            list1.appendChild(cr);
          }
        }
      });
    }


    forcheckid1();


    function fortimeajax() {
      var firsdata = document.getElementById("pervoe").value;
      var secnddata = document.getElementById("vtoroe").value;
      var timedel = $('input[name="delenievremy"]:checked').attr('id');
      //не использованные параметры
      listnouse = document.getElementById("tasks__lists1");
      linouse = listnouse.querySelectorAll('li');
      //список параметров 1
      var listtask2 = document.getElementById("tasks__list2");
      var li = listtask2.querySelectorAll('li');
      var stroka = '';
      // список параметров 2
      var listtask3 = document.getElementById("tasks__list3");
      var li3 = listtask3.querySelectorAll('li');
      var stroka3 = '';
      // список параметров 3
      var listtask4 = document.getElementById("tasks__list4");
      var li4 = listtask4.querySelectorAll('li');
      var stroka4 = '';
      //обновление переменных при нажатии кнопки отмены
      cancelnouse = linouse;
      cancellist1 = li;
      cancellist2 = li3;
      cancellist3 = li4;
      cancelfirsttime = firsdata;
      cancelsecondtime = secnddata;
      canceltimescale = timedel;

      var arrli2 = [];
      //подготовка времени для запроса
      firsdata = firsdata.replace('-', '');
      firsdata = firsdata.replace('-', '');
      firsdata = firsdata.replace('T', ' ');
      secnddata = secnddata.replace('-', '');
      secnddata = secnddata.replace('-', '');
      secnddata = secnddata.replace('T', ' ');
      //строка 2ого списка
      for (let i = 0; i < li.length; i++) {
        if (i > 0) {
          stroka = stroka + ' , ';
        }
        stroka = stroka + `${li[i].id}`;
        arrli2.push(li[i].id);

      }
      //строка 2ого списка
      for (let i = 0; i < li3.length; i++) {
        if (i > 0) {
          stroka3 = stroka3 + ' , ';
        }
        stroka3 = stroka3 + `${li3[i].id}`;
      }
      //строка 2ого списка
      for (let i = 0; i < li4.length; i++) {
        if (i > 0) {
          stroka4 = stroka4 + ' , ';
        }
        stroka4 = stroka4 + `${li4[i].id}`;
      }
      if (stroka.length == 0) {
        stroka = "0";
      }
      if (stroka3.length == 0) {
        stroka3 = "0";
      }
      if (stroka4.length == 0) {
        stroka4 = "0";
      }
      $.ajax({
        url: "ajax/forcheckajax2.php",
        type: "POST",
        data: { "idofkotl": idofkotl, "stroka": stroka, "stroka3": stroka3, "stroka4": stroka4, "firsdata": firsdata, "secnddata": secnddata, "timedel": timedel },
        dataType: 'json',
        success: function (datafromphp) {
          //удаление canvas
          document.querySelector('#myChart').remove();
          //создание нового canvas
          var newelem = document.createElement('canvas');
          newelem.id = "myChart";
          document.getElementById('divforcanvas').appendChild(newelem);
          //создание dataset из полученного json
          var datasetforgraph = [];
          var datasetnum = [];
          var dataprimer = [];
          var colorch = 0;
          var del = 'minute'
          if (timedel == 'hour') {
            del = 'hour'
          }
          if (timedel == 'day') {
            del = 'day'
          }
          if (timedel == 'month') {
            del = 'month'
          }

          var kolvoy = [false, false, false];
          for (let i = 0; i < datafromphp.length; i = i + 2) {
            if (datafromphp[i] == "!") {
              i++;
              let nuzhy;
              let massivdlyexper = [];
              let labelforgraph = [];
              labelforgraph = labelforgraph.concat(datafromphp[i]);
              i++;
              if (datafromphp[i] == "firsty") {
                kolvoy[0] = true;
                nuzhy = "y";
              }
              if (datafromphp[i] == "secondy") {
                kolvoy[1] = true;
                nuzhy = "y1";
              }
              if (datafromphp[i] == "thirdy") {
                kolvoy[2] = true;
                nuzhy = "y2";
              }
              i++;
              for (let j = 0; j < datasetforgraph.length; j++) {
                massivdlyexper.push({ ...datasetforgraph[j] });
              }
              datasetnum.push({ data: dataprimer.concat(datasetforgraph), yAxisID: nuzhy, label: `${labelforgraph[0]} , Y:${nuzhy}`, borderColor: colorsforgrapg[colorch++] });
              if (colorch == colorsforgrapg.length) {
                colorch = 0;
              }
              dataprimer.length = 0;
              datasetforgraph.length = 0;
            }
            let dataforx = new Date(datafromphp[i + 1])
            datasetforgraph.push({ x: dataforx, y: datafromphp[i] });
          }
          var speedDAta = { datasets: datasetnum };
          const myChart = new Chart(
            document.getElementById('myChart'),
            {
              type: 'line',
              data: speedDAta,
              options: {
                zoomEnabled: "true",
                scales: {
                  x: {
                    type: 'time',

                    time: {
                      unit: 'minute',
                      displayFormats: {
                        minute: 'yyyy-MM-dd HH:mm'
                      }
                    },
                    ticks: {

                      maxTicksLimit: 10,

                      callback: function (value, index, ticks) {
                        return value;
                      }
                    }

                  },
                  y: {
                    type: 'linear',
                    display: kolvoy[0],
                    position: 'left',
                  },
                  y1: {
                    type: 'linear',
                    display: kolvoy[1],
                    position: 'left',
                  },
                  y2: {
                    type: 'linear',
                    display: kolvoy[2],
                    position: 'left',
                  }
                }
              }
            }
          );


        }
      });
      $('.popup-fade').fadeOut();
    }
    function cancelbutt() {
      var listno = document.getElementById("tasks__lists1");
      while (listno.firstChild) {
        listno.removeChild(listno.firstChild);
      }
      for (let i = 0; i < cancelnouse.length; i++) {
        listno.appendChild(cancelnouse[i]);
      }

      var list1 = document.getElementById("tasks__list2");
      while (list1.firstChild) {
        list1.removeChild(list1.firstChild);
      }
      for (let i = 0; i < cancellist1.length; i++) {
        list1.appendChild(cancellist1[i]);
      }

      var list2 = document.getElementById("tasks__list3");
      while (list2.firstChild) {
        list2.removeChild(list2.firstChild);
      }
      for (let i = 0; i < cancellist2.length; i++) {
        list2.appendChild(cancellist2[i]);
      }
      var list3 = document.getElementById("tasks__list4");
      while (list3.firstChild) {
        list3.removeChild(list3.firstChild);
      }
      for (let i = 0; i < cancellist3.length; i++) {
        list3.appendChild(cancellist3[i]);
      }

      document.getElementById("pervoe").value = cancelfirsttime;
      document.getElementById("vtoroe").value = cancelsecondtime;
      document.getElementById(`${canceltimescale}`).checked = true;

    }
  </script>
</body>

</html>