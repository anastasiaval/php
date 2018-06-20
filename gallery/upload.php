<?php
if (isset($_POST['submit'])) {

    $newFileName = $_POST['filename'];
    if (!$_POST['filename']) {
        $newFileName = "gallery";
    } else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }

    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    if(in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $imageFullName = $newFileName . '.' . uniqid('', true). '.' .$fileActualExt;
                $fileDestination = 'img/big/' . $imageFullName;

                include_once 'config.php';

                $sql = "SELECT * FROM gallery;";

                $result = mysqli_query($connect, $sql);

                $sql = "INSERT INTO gallery (imgName, imgView) VALUES ($imageFullName, '0');";

                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: index.php?upload=success");
                // create_thumbnail($fileDestination, $fileActualExt); from, to

            } else {
                echo "Файл слишком большой.";
            }
        } else {
            echo "Ошибка при загрузке.";
        }
    } else {
        echo "Вы можете загрузить только файлы с расширениями: '.jpg', '.jpeg', '.png', '.gif'.";
    }
}

//function create_thumbnail($path, $extension) {
//    list($width, $height) = getimagesize($path);
//
//    if ($extension === 'jpg') {
//        $src = imagecreatefromjpeg($path);
//    } else if ($extension === 'png') {
//        $src = imagecreatefrompng($path);
//    } else if ($extension === 'gif') {
//        $src = imagecreatefromgif($path);
//    } else {
//        return false;
//    }
//
//    $newWidth = 200;
//    $newHeight = ($height / $width) * $newWidth;
//
//}