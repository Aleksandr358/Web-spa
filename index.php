<?php
session_start();

//$login = $_POST['login'];
//$password = $_POST['password'];
include_once __DIR__ . '/functions.php';

     if ( null !== getCurrentUser() ) {

?>
    <html>
    <head>
    <title>Спа салон</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>  
    // функция, которая запрашивает данные с сервера
    function timer(){   
        // вызываем встроенную функцию, которая поможет нам получить данные с сервера
        $.ajax({   
            // какой скрипт серверу нужно выполнить
            url: "timer.php",   
            // предыдущие ответы не сохраняем
            cache: false,   
            // если всё хорошо, отправляем ответ от сервера на страницу в блок content
            success: function(html){   
                $("#content").html(html);   
            }   
        });   
    }   
    
    // как только страница полностью загрузилась
    $(document).ready(function(){
        // начинаем каждую секунду запрашивать новые данные для отсчёта
        timer();   
        setInterval('timer()',1000);   
    });   
    </script>
    </head>
    <body>
    <p>Здравствуйте <?php echo getCurrentUser(); ?>. Вы вошли в фотогалерею!</p>
   
    <a href="/gallery.php">Перейти в фотогалерею SPA-салона</a>
    <br><br>

    <div class="container" >
    <div class="row">
      <div class="col-12">
        <h2>
            <div id="content"></div>
        </h2>
      </div>
    </div>
  </div> 

    <a href="/logout.php">Выход</a>
    <br><br>
    </body>
    </html>
    <?php
    //  echo password_hash('891', PASSWORD_DEFAULT);//PASSWORD_DEFAULT - берёт наиболее стойкий по умолчанию алгоритм
    //  $hash = '$2y$10$ZyYlqBMmi9qEWcgnR10pqOCxRQABUoDhu6mHmm8iOzlHPv//RBosS';

}else {
    header('Location: /log.php');
}
    ?>