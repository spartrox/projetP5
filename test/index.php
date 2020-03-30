<!DOCTYPE html>

<?php

require "vendor/autoload.php";

use te\st\Tentative; //je vais utiliser la class Tentative du namespace te\st
//use te\st\ArticleManager;
?>

<html>
	<head>
	</head>
	
	<body>
	<h1>ceci est un test !</h1>
	
	<?php
		$t1 = new Tentative(); //j'instancie mon objet...
		echo $t1::message(); // j'appelle ma méthode...
	?>
	
	</body>
	
</html>
