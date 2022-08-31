<html>
	<head>
		<title>PHP-1</title>
    </head>
	<body>
        <h2>Фотогалерея SPA-салона на Попова, 3</h2>

        <?php
        $list = scandir(__DIR__ . '/images');
        $list = array_diff($list, ['.', '..']);
        
       // Выводим в браузер изображения из папки images
        foreach ($list as $img) {
            ?>
            <img src="/images/<?php echo $img; ?>" height="30%">
            <?php
        }
        ?>
        <br>
        <a href="/index.php">На главную</a>
	</body>
</html>