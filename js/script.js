
document.querySelector('.swiper').classList.remove("swiper");
let div1 = document.querySelector('.swiper-wrapper')
div1.classList.remove("swiper-wrapper");
div1.classList.add("lists_display");
let lists = document.querySelectorAll('.swiper-slide');

lists.forEach((list) => { list.classList.remove("swiper-slide") })
$(".main-container__button").click(function () {
    if (window.matchMedia("(max-width: 768px)").matches) {
        var liElements = document.querySelectorAll('.modal-container__params-items li');
        liElements.forEach((lielem) => {
            lielem.addEventListener('dblclick', (event) => {
                let trueul = document.querySelector(".swiper-slide-active");
                let divul = trueul.querySelector(".swiper-no-swiping");
                divul.querySelector(".modal-container__params-items").appendChild(event.target);
                event.target.addEventListener('dblclick', (event) => {
                    let trueul = document.querySelector("#params_list");
                    trueul.appendChild(event.target);
                })
            })
        });
        document.querySelector('#swipercontainer').classList.add("swiper");
        div1.classList.add('swiper-wrapper');
        div1.classList.remove('lists_display');
        lists.forEach((list) => { list.classList.add("swiper-slide") })
        const swiper = new Swiper('.swiper', {
            pagination: {
                el: ".swiper-pagination",
            },
        });
    } else {
        const paramsort = Sortable.create(document.getElementById('params_list'), {
            group: 'shared',
            animation: 150
        });
        const firstsort = Sortable.create(document.getElementById('axis_list_1'), {
            group: 'shared',
            animation: 150
        });
        const secondsort = Sortable.create(document.getElementById('axis_list_2'), {
            group: 'shared',
            animation: 150
        });
        const thirdsort = Sortable.create(document.getElementById('axis_list_3'), {
            group: 'shared',
            animation: 150
        });
    }
    $(".modal-container").show();
});
$(".modal-container__close").click(function () {
    var listparametrs = document.getElementById("params_list");
    while (listparametrs.firstChild) {
        listparametrs.removeChild(listparametrs.firstChild);
    }
    var list1 = document.getElementById("axis_list_1");
    while (list1.firstChild) {
        list1.removeChild(list1.firstChild);
    }
    var list2 = document.getElementById("axis_list_2");
    while (list2.firstChild) {
        list2.removeChild(list2.firstChild);
    }
    var list3 = document.getElementById("axis_list_3");
    while (list3.firstChild) {
        list3.removeChild(list3.firstChild);
    }
    forcheckid1();
    setDates();
    $(".modal-container").hide();
});
$(".modal-container__create").click(function () {
    fortimeajax();
    $(".modal-container").hide();
});




function forcheckid1() {
    $.ajax({
        url: "ajax/forcheckajax.php",
        type: "POST",
        data: { 'idofkotl': idofkotl },
        dataType: 'json',
        success: function (data) {
            let params_list = document.getElementById("params_list");
            while (params_list.firstChild) {
                params_list.removeChild(params_list.firstChild);
            }
            for (let i = 0; i < data.length; i = i + 2) {
                var lichild = document.createElement('li');
                lichild.innerHTML = `${data[i + 1]}`;
                lichild.id = data[i];
                lichild.className = "modal-container__params-item";
                params_list.appendChild(lichild);
            }
        }
    });
}
forcheckid1()
function forchecknameofkotl() {
    $.ajax({
        url: "ajax/forcheckajaxnameofkot.php",
        type: "POST",
        data: { 'idofkotl': idofkotl },
        dataType: 'json',
        success: function (data) {
            var botofkotlname = document.querySelector('.main-container__text');
            botofkotlname.innerHTML += data;
        }
    });
}
$(document).ready(function () {
    forchecknameofkotl();
})
let colorsforgrapg = ["red", "blue", "green", "black"];
function DatatoString(data) {
    let day = data.getDate();
    let month = data.getMonth() + 1;
    let year = data.getFullYear();
    let hours = data.getHours();
    let minutes = data.getMinutes();
    day = day < 10 ? '0' + day : day;
    month = month < 10 ? '0' + month : month;
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    let formattedDate = day + "." + month + "." + year + ' ' + hours + ':' + minutes;
    return formattedDate;
}

function fortimeajax() {
    var firsdata = document.getElementById("begin_time").value;
    var secnddata = document.getElementById("end_time").value;
    var timedel = $('input[name="time_scale"]:checked').attr('id');
    //не использованные параметр
    //список параметров 1
    var axis_list_first = document.getElementById("axis_list_1");
    var li = axis_list_first.querySelectorAll('li');
    var straxis_1 = '';
    // список параметров 2
    var axis_list_second = document.getElementById("axis_list_2");
    var li3 = axis_list_second.querySelectorAll('li');
    var straxis_2 = '';
    // список параметров 3
    var axis_list_third = document.getElementById("axis_list_3");
    var li4 = axis_list_third.querySelectorAll('li');
    var straxis_3 = '';
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
            straxis_1 = straxis_1 + ' , ';
        }
        straxis_1 = straxis_1 + `${li[i].id}`;

    }
    //строка 2ого списка
    for (let i = 0; i < li3.length; i++) {
        if (i > 0) {
            straxis_2 = straxis_2 + ' , ';
        }
        straxis_2 = straxis_2 + `${li3[i].id}`;
    }
    //строка 2ого списка
    for (let i = 0; i < li4.length; i++) {
        if (i > 0) {
            straxis_3 = straxis_3 + ' , ';
        }
        straxis_3 = straxis_3 + `${li4[i].id}`;
    }
    if (straxis_1.length == 0) {
        straxis_1 = "0";
    }
    if (straxis_2.length == 0) {
        straxis_2 = "0";
    }
    if (straxis_3.length == 0) {
        straxis_3 = "0";
    }
    $.ajax({
        url: "ajax/forcheckajax2.php",
        type: "POST",
        data: {
            "idofkotl": idofkotl, "stroka": straxis_1, "stroka3": straxis_2, "stroka4": straxis_3, "firsdata": firsdata, "secnddata": secnddata, "timedel": timedel
        },
        dataType: 'json',
        success: function (datafromphp) {
            //удаление canvas
            document.querySelector('.main-container__canvas').remove();
            //создание нового canvas
            var newelem = document.createElement('canvas');
            newelem.className = "main-container__canvas";
            document.querySelector('.main-container__graph').appendChild(newelem);
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
                    datasetnum.push({ data: dataprimer.concat(datasetforgraph), yAxisID: nuzhy, label: `${labelforgraph[0]} , Y:${nuzhy}`, borderColor: colorsforgrapg[colorch++], pointRadius: 0 });
                    if (colorch == colorsforgrapg.length) {
                        colorch = 0;
                    }
                    dataprimer.length = 0;
                    datasetforgraph.length = 0;
                }
                let dataforx = new Date(datafromphp[i + 1]);
                let dataforx_str = DatatoString(dataforx)
                datasetforgraph.push({ x: dataforx_str, y: datafromphp[i] });//dataforx
            }
            var speedDAta = { datasets: datasetnum };
            console.log(speedDAta)
            let chart = new Chart(
                document.querySelector('.main-container__canvas'),
                {
                    type: 'line',
                    data: speedDAta,
                    options: {
                        maintainAspectRation: false,
                        scales: {
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
                            },
                            x: {
                                ticks: {
                                    maxTicksLimit: 10,
                                    autoSkip: true,
                                    maxRotation: 0,
                                }
                            }
                        },
                        plugins: {
                            zoom: {
                                zoom: {
                                    wheel: {
                                        enabled: true,
                                    },
                                    mode: 'y',
                                },
                                pinch: {
                                    enabled: true
                                },
                            },
                        }
                    },

                }

            );

            chart.resize(1900, 825)
        }

    });

    $(".modal-container").hide();
}
function setDates() {
    var today = new Date(); // Получаем текущую дату
    var yesterday = new Date(today);
    yesterday.setDate(today.getDate() - 1);
    var year = yesterday.getFullYear();
    var month = (yesterday.getMonth() + 1).toString().padStart(2, '0');
    var day = yesterday.getDate().toString().padStart(2, '0');
    var hours = yesterday.getHours().toString().padStart(2, '0');
    var minutes = yesterday.getMinutes().toString().padStart(2, '0');

    var yesterdayValue = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
    document.querySelector('#begin_time').value = yesterdayValue;

    var year = today.getFullYear();
    var month = (today.getMonth() + 1).toString().padStart(2, '0');
    var day = today.getDate().toString().padStart(2, '0');
    var hours = today.getHours().toString().padStart(2, '0');
    var minutes = today.getMinutes().toString().padStart(2, '0');

    var todayValue = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
    document.querySelector('#end_time').value = todayValue;
    document.querySelector("#min").checked = true;
}
setDates()

