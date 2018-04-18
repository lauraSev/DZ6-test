<?php

	if ( isset ($_FILES ["test"])) {
		$goodfile = move_uploaded_file
			(
					$_FILES["test"]["tmp_name"],
				__DIR__  .  DIRECTORY_SEPARATOR . "tests"  .  DIRECTORY_SEPARATOR .  $_FILES["test"]["name"]
			);
			if ($goodfile){
				header('Location: list.php'); 
				exit;

				}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Обработка форм</title>
</head>

<body>

<h2>Форма для загрузки файлов</h2>
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
    
    <form action="admin.php" method="post" enctype="multipart/form-data">
        <input type="file" name="test"><br>
        <input type="submit" value="Загрузить"><br>
    </form>

</body>
</html>