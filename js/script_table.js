(function forchecknameofkotl() {
  $.ajax({
    url: "ajax/tableofkotlajax.php",
    type: "POST",
    data: {},
    dataType: 'json',
    success: function (data) {
      var list1 = document.getElementById("tasks__list");
      while (list1.firstChild) {
        list1.removeChild(list1.firstChild);
      }
      for (let i = 0; i < data.length; i = i + 2) {
        var cr = document.createElement('li');
        cr.innerHTML = `<a id="${data[i]}" class="main-container-link" href="../otchet/check.php?idkotl=${data[i]}">${data[i + 1]}</a>`;
        cr.id = data[i];
        cr.className = "main-container-item"
        list1.appendChild(cr);
      }
    }
  });
})()