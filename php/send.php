<?php 

//print_r($_FILES);

if ( isset($_FILES['image'])) {
  $errors = array();

  $fileName = $_FILES['image']['name'];
  $fileSize = $_FILES['image']['size'];
  $fileTmp = $_FILES['image']['tmp_name'];
  $fileType = $_FILES['image']['type'];

  $fileExt = explode('.',$_FILES['image']['name']);
  $fileExt = end($fileExt);
  $fileExt = strtolower($fileExt);

  $extensions = array("jpeg","jpg","png");// разрешённые расширения

  if (!in_array($fileExt, $extensions)) {
    $errors[] = "Неверный формат файла";
    
  }

  if ($fileSize > 2097152) {
    $errors[] = "Файл должен быть не более 2Мб";
  }
  
  if (empty($errors)) {
    move_uploaded_file($fileTmp , '../images/'.$fileName);
    echo "Файл загружен успешно!";
  } else {
    print_r($errors);
    exit();
  }
}

?>