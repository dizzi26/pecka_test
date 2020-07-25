<!DOCTYPE html>
<html lang="cs">
<meta charset="UTF-8">

<title>Pig Latin Translator</title>
<link rel="stylesheet" href="style.css">

<body>

<?php

function translate($string) 
{
	$result = "";
	
	#Parse string by words
	$string = strtok($string, " ");
	while ($string !== false)
	{
		$first_let = substr($string, 0,1);
		$string = strtolower($string);
		$string = trim($string);
		$replace = preg_replace("/^(ch|s?qu|thr?|st|bl|sch|[^aeiou])(?!t)(?!r)(.+)/", "$2$1", $string);
		$string = $replace . "ay";
		$sign = strpbrk($string,".,!?");
		$sign = substr($sign, 0,1);
		if($sign==true) 
		{
			$string=str_replace($sign,"",$string);
			$string = $string . $sign;
		}
		
		if(ctype_upper($first_let) === true) 
			{$velke = true;} 
		else
			{$velke = false;}
		
		if($velke==true) 
		{
			$string = ucfirst($string);
		}
	
	$result .= $string." ";
	$string = strtok(" ");
   }
return $result;
}
?>


<div class="block">
<a href="pig.php"><h1 class="h1">Pig Latin Translator</h1></a>


<form action="" method="get" style="">
<textarea class="form_input" type="textarea" name="translate" placeholder=""></textarea>	
<input class="form_button" type="submit" value="PIG IT">
</form>

<?php if(isset($_GET["translate"])) 
	{
		$translate = $_GET['translate'];
		echo "<b style='color: gray;'>To trasnlate:</b> ".$translate."<br><br>";
		echo "<textarea class='result' disabled>";
		echo translate($translate);
		echo "</textarea>";
	}
?>


</div>
</body>
</html>