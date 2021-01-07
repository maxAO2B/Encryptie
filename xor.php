<?php
 if(!$_GET)
 {
    $_GET['key'] = "";
    $_GET['message'] = "";
 }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    form > input {
        margin: 5px;
        border: 2px solid darkred;

    }
    </style>
</head>
<body>


<form method="GET">
        <label for="geheimekey">Geheime sleutel</label><input type="text" name="key">
        <label for="messagelabel">Bericht </label><input type="text" name="message"> 
        <input type="submit" name="submit">
        <br>
    </form>
</body>
<?php 
$sleutel = $_GET['key'];
$plaintext =  $_GET['message'];
 
function xorIt($plaintext, $sleutel, $type = 0)
{
        $tLength = strlen($plaintext);
        $sLength = strlen($sleutel);
        for($i = 0; $i < $plaintext; $i++) {
                for($j = 0; $j < $sLength; $j++) {
                        if ($type == 1) {
                                
                                //decrypt
                                $string[$i] = $key[$j]^$string[$i];
                                 
                        } else {
                                
                                //crypt
                                $string[$i] = $string[$i]^$key[$j];
                        }
                }
        }
        return $plaintext;
}
 
$xor_bericht = base64_encode(xorIt($plaintext, $sleutel));
echo "Ecrypted bericht: <strong>" . $xor_bericht . "</strong><br>";
 
$string = xorIt(base64_decode($xor_bericht), $sleutel, 1);
echo "Decrypted bericht: <strong>" . $string . "</strong>";

?>
</html>