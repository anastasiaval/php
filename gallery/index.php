<?php
$my_title = 'ДЗ 5';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?=$my_title?></title>
    <style>
        .gallery {
            display: flex;
            margin: 50px auto;
            justify-content: space-around;
            flex-wrap: wrap;
            max-width: 700px;
        }
        .gallery img {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="gallery">
    <?php
    $dir_path = "img/big/";

    if(is_dir($dir_path))
    {
        $files = scandir($dir_path);

        for($i = 0; $i < count($files); $i++) {
            if($files[$i] !=='.' && $files[$i] !=='..')
            {
                $file = pathinfo($files[$i]);
                echo "<a href=\"$dir_path$files[$i]\" target=\"_blank\"><img src='$dir_path$files[$i]' style='width:200px;height:113px;'></a>";
            }
        }
    }
    ?>

    <?php
//
    //include_once 'config.php';
//
    //$sql = "SELECT FROM gallery ORDER BY imgView ASC";
    //
//
    ?>

</div>

<div class="gallery-upload">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="text" name="filename" placeholder="Имя файла">
        <input type="file" name="file">
        <button type="submit" name="submit">Загрузить фото</button>
    </form>
</div>

<?php



?>

</body>
</html>