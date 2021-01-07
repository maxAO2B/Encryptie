<!DOCTYPE HTML>
<head>
	</head>

	<html>
	<body>
<?php
if(!$_POST){
	$_POST['invoer'] = null;
	$_POST['cijfer'] = null;
}
	function encrypt($txt, $rot){

		$txt = strtolower($txt);
		$et = "";	
		for($i = 0; $i < strlen($txt); $i++){
			
			$nummer = ord($txt[$i]);
			$nummer += $rot;
			if($nummer > ord('z')){
			 	$nummer -= 26;
			 }elseif($nummer < ord('a')){
				$nummer += 26;
			 }
			$et .= chr($nummer);
		}


		return $et;
	}
  $text = $_POST['invoer'];
  $rot = $_POST['cijfer'];
  if(isset($_POST['verzend'])){
  $enctext = encrypt($text, $rot);
  echo $enctext;
}
?>
<form method="POST">
	<input type="text" name="invoer">
	<input type="text" name="cijfer" placeholder="Rotatie van plaatsen">
	<input type="submit" name="verzend" value="Encrypt">
</form>
<div class="output"></div>
</body>
</html>
