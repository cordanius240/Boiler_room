<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/2.0.1/chartjs-plugin-zoom.min.js"
        integrity="sha512-wUYbRPLV5zs6IqvWd88HIqZU/b8TBx+I8LEioQ/UC0t5EMCLApqhIAnUg7EsAzdbhhdgW07TqYDdH3QEXRcPOQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <script defer src="./js/script.js"></script>
    <title>Cotls</title>
</head>
<?php
if (isset($_GET['idkotl'])) {
    echo ('<script>var idofkotl=' . $_GET["idkotl"] . ';</script>');
} else {
    header("Location: ../otchet/tableofkotl.php");
}
?>

<body>
    <header class="header">
        <div class="header-container">
            <nav class="header-container__nav">
                <ul class="header-container__items">
                    <li class="header-container__item">
                        <a href="#" class="header-container__link">Отрисовка графиков</a>
                    </li>
                    <li class="header-container__item">
                        <a href="./tableofkotl.php" class="header-container__link">Выбор котельной</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section class="main">
            <div class="main-container">
                <div class="wrapper">
                    <button class="main-container__button">Открыть меню для построения графиков</button>
                    <p class="main-container__text">Название котельной: </p>
                </div>
                <div class="main-container__graph">
                    <canvas class="main-container__canvas">
                    </canvas>
                </div>
            </div>
        </section>
        <section class="modal">
            <div class="modal-container">
                <div class="modal-container__content">
                    <div class="modal-container__lists">
                        <div class="modal-container__list" id="params-container">
                            <p class="modal-container__params-title">
                                Параметры
                            </p>
                            <ul class="modal-container__params-items" id="params_list">
                                <li class="modal-container__params-item">asd</li>
                            </ul>
                        </div>
                        <div class="swiper" id="swipercontainer">
                            <div class="swiper-wrapper">
                                <div class="modal-container__list swiper-slide">
                                    <p class="modal-container__params-title">
                                        Ось Y
                                    </p>
                                    <div class="swiper-no-swiping ">
                                        <ul class="modal-container__params-items" id="axis_list_1">
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal-container__list swiper-slide">
                                    <p class="modal-container__params-title">
                                        Ось Y1
                                    </p>
                                    <div class="swiper-no-swiping">
                                        <ul class="modal-container__params-items" id="axis_list_2">

                                        </ul>
                                    </div>
                                </div>
                                <div class="modal-container__list swiper-slide">
                                    <p class="modal-container__params-title">
                                        Ось Y2
                                    </p>
                                    <div class="swiper-no-swiping">
                                        <ul class="modal-container__params-items" id="axis_list_3">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>
                    <div class="modal-container__times">
                        <p class="modal-container__times-text">Промежуток времени</p>
                        <input type="datetime-local" class="modal-container__times-input" id="begin_time">
                        <input type="datetime-local" class="modal-container__times-input" id="end_time">
                    </div>
                    <div class="modal-container__scale">
                        <div class="modal-container__scale-radios">
                            <label for="min">
                                <input type="radio" name="time_scale" id="min" class="modal-container__scale-input-min">
                                <span class="modal-container__scale-min-real"></span>
                                Минуты
                            </label>
                            <label for="hour">
                                <input type="radio" name="time_scale" id="hour"
                                    class="modal-container__scale-input-hour">
                                <span class="modal-container__scale-hour-real"></span>
                                Часы
                            </label>
                            <label for="day">
                                <input type="radio" name="time_scale" id="day" class="modal-container__scale-input-day">
                                <span class="modal-container__scale-day-real"></span>
                                Дни
                            </label>
                            <label for="mounth">
                                <input type="radio" name="time_scale" id="mounth"
                                    class="modal-container__scale-input-mounth">
                                <span class="modal-container__scale-mounth-real"></span>
                                Месяца
                            </label>
                        </div>
                    </div>
                    <div class="modal-container__buttons">
                        <button class="modal-container__close">Закрыть</button>
                        <button class="modal-container__create">Построить график</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>