<?php
$nametest = $_GET['test_file_name']; 
$papka = __DIR__  .  DIRECTORY_SEPARATOR . "tests"  .  DIRECTORY_SEPARATOR ;
if (!is_file ($papka . $nametest)){
	http_response_code(404);
	exit(1);
}
$soderjimoe = file_get_contents( $papka . $nametest);
$soderjimoe = json_decode ( $soderjimoe, true);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Лиетратурный тест</title>
</head>
<body>
<pre>
<?php 
 
if (isset ($_POST['send_test'])){
	//print_r ($_POST);
	$allrightanswers = 0;
	$allbadanswers = 0; 
	foreach ( $_POST["question"] as $questionnumber => $useranswers) {
		$is_right = ($soderjimoe["questions"][$questionnumber]["answers"][$useranswers]["is_right"]);
		if ($is_right == "Y"){
			$allrightanswers++;
			}
		if ($is_right == "N"){
			$allbadanswers++;
			}	
		
	}
	echo "Правильных ответов: " . $allrightanswers;
	echo "<br>";
	echo "Неправильных ответов: " . $allbadanswers;
	echo "<br><br>";
	echo '<form action="sertificate.php" method="post">';
		echo '<input type="text" name="user" placeholder="Введите ваше имя латиницей"><br>';
		echo '<p><input type="submit" value="Получить сертификат" name="send_user"></p>';
		echo '<input type="hidden" value="' .$allrightanswers. '" name="kolichestvo-pravilnyh-otvetov">';
	echo '</form>';
}
else {

	echo '<form action="test.php?test_file_name=' . $nametest . '" method="post">';
	
	
	//echo $nametest;
				
				echo " <h3>" .  $soderjimoe["title"] . " </h3>";
				echo " (" . $soderjimoe["description"] . " )<br><br>";
				foreach ( $soderjimoe["questions"] as $questionnumber => $question) {
					//print_r ($question);
					echo "<h4>" . $question["question"] . " </h4>";
					foreach ($question ["answers"] as $answernumber => $answer){
					//print_r ($answertxt);
					echo "<br>";	
					echo '<input type="radio" name="question['.$questionnumber.']" value="'.$answernumber.'">' . $answer["title"] . '<br>';
					}
				}
				echo '<p><input type="submit" name="send_test"></p>';
	echo '</form>';
}

?>

</body>
</html>