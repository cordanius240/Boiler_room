<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <style type="text/css">
    #tasks__lists1 {
      display: block;
      justify-content: center;
      align-items: center;
      width: 50%;
      max-width: 90%;
      list-style-type: none;
      margin: 0;
      padding: 5px 0 0 0;
      /* float: left; */
      margin-right: 10px;

    }

    #tasks__lists1 li {
      margin: 0 5px 5px 5px;
      padding: 10px;
      word-break: break-all;
      box-shadow: rgba(22, 33, 54, 0.16) 0px 1px 2px;
      border: 1px solid#0c0b0b;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
      width: 90%;
    }

    .maindiv {
      width: 100%;
      height: 90%;
      display: inline-flex;
      align-items: center;
      text-align: center;
      flex-direction: column;
      overflow-y: auto;
    }

    .tasks__item {
      margin-bottom: 5px;
      padding: 5px;
      text-align: center;
      cursor: move;
      box-shadow: rgba(22, 33, 54, 0.16) 0px 1px 2px;
      border: 1px solid#0c0b0b;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
    }

    a {
      display: inline-block;

      color: black;

      padding: 1rem 1.5rem;

      text-decoration: none;

      width: 100%;
      height: 90%;
      text-align: center;
    }

    header {
      width: 100%;
      height: 10%;
      text-align: center;
    }
  </style>
</head>
<header>
  <h1>Список доступных котеленых</h1>
</header>

<body>
  <div class="maindiv">
    <ul class="tasks__list" id="tasks__lists1">
    </ul>
  </div>
</body>

</html>
<script type="text/javascript">
  function forchecknameofkotl() {
    $.ajax({
      url: "ajax/tableofkotlajax.php",
      type: "POST",
      data: {},
      dataType: 'json',
      success: function (data) {
        var list1 = document.getElementById("tasks__lists1");
        while (list1.firstChild) {
          list1.removeChild(list1.firstChild);
        }
        for (let i = 0; i < data.length; i = i + 2) {
          var cr = document.createElement('li');
          cr.innerHTML = `<a id="${data[i]}" href="../otchet/check.php?idkotl=${data[i]}">${data[i + 1]}</a>`;
          cr.id = data[i];
          list1.appendChild(cr);
        }
      }
    });
  }
  forchecknameofkotl();
</script>