<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <style>
    body {
        background-color: lightgray;
    }
    .flex-container{
			display: flex;
			flex-direction: row;
		}
    table {
    }

    td {
        padding: 2px;
    }
    #main2 {
        padding-left: 200px;
    }

    form {
        padding: 5px;
    }

    .inputbox {
        width: 200px;
        height: 40px;
        margin: 5px;
        border: none;
        background: none;
        border-bottom: 1px solid black;

    }
    </style>
</head>
<body>
<?php
function encrypt($key, $text)
{
	$key = strtolower($key);
	$bericht = "";
	$ki = 0;
	$kl = strlen($key);
	$length = strlen($text);
	
	for ($i = 0; $i < $length; $i++)
	{
		if (ctype_alpha($text[$i]))
		{
			if (ctype_upper($text[$i]))
			{
				$text[$i] = chr(((ord($key[$ki]) - ord("a") + ord($text[$i]) - ord("A")) % 26) + ord("A"));
			}
			
			else
			{
				$text[$i] = chr(((ord($key[$ki]) - ord("a") + ord($text[$i]) - ord("a")) % 26) + ord("a"));
			}
			$ki++;
			if ($ki >= $kl)
			{
				$ki = 0;
			}
		}
	}
	echo $text;
}



?>
<?php
$key = "";
$bericht = "";
$valid = true;

// if form was submit
if ($_SERVER['REQUEST_METHOD'] == "POST")
{

	// variables zetten
	$key = $_POST['sleutel'];
	$bericht = $_POST['bericht'];
	
	// key ingevuld of niet
	if (empty($_POST['sleutel']))
	{
		echo "Vul een sleutel in.";
		$valid = false;
	}
	
	// bericht ingevuld

	
	// kijken of er alleen maar alfabetische letters in zitten
	else if (isset($_POST['sleutel']))
	{
		if (!ctype_alpha($_POST['bericht']))
		{
			echo "Alleen alfabetische karakters.";
			$valid = false;
		}
	}
	
	// als input goed is encrypt
	if ($valid)
	{

		if (isset($_POST['encrypt']))
		{
			$bericht = encrypt($key, $bericht);
		}

	}
}
?>


    <div class="flex-container">
        <div id="main">
            <form action="" method="post">
            <input type="text" class="inputbox" placeholder="Sleutel" name="sleutel"><br>
            <input type="text" class="inputbox" placeholder="Bericht" name="bericht"><br>
            <input type="submit"  name="encrypt" value="Encrypt">    
            </form>
            </div>

        <div id="main2">
            <?php
                
                $start = 96;
                echo "<table>";
                
                for ($j=1; $j < 27; $j++) { 
                    echo "<tr>";
                    for ($i=0;  $i < 26 ; $i++) { 
                        echo "<td>";
                        $letter = $start + $j + $i;

                        if($letter > ord('z')){
                            $letter -= 26;
                        }elseif($letter < ord('a')){
                        $letter += 26;
                        }   
                    
                    
                    echo chr($letter);
                    echo "</td>";
                }
                echo "</tr>";
                }
                
                echo "</table>";

                ?>
            
                </div>
        </div>
</body>
</html>