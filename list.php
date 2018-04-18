<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Список тестов</title>
</head>
<pre>
<?php
	$papka = __DIR__  .  DIRECTORY_SEPARATOR . "tests"  .  DIRECTORY_SEPARATOR ;
	$files = scandir($papka);
	
	
	foreach ($files as $file) {
		if (is_file ($papka . $file)) {
			
			
			$soderjimoe = file_get_contents( $papka . $file);
			$soderjimoe = json_decode ( $soderjimoe, true);
			
			echo '<a href="test.php?test_file_name=' .$file . '">' .  $soderjimoe ["title"] . '</a><br>';
			
			
		}
		
	}
	
?>

<body>
</body>
</html>

 