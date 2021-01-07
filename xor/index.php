<?php
$xored = "test";

function XorMessage($key, $message) {
    $result = "";
    $charXored = "";
    $j = 0;
    for($i = 0; $i < strlen($message); $i++) {
        $pos = $i % strlen($key);
        $charXored = $key[$pos] ^ $message[$i];
        $result .= $charXored;
    }
    return $result;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <input type="text" name="key">
        <input type="text" name="message">
        <input type="submit" name="submit">
    </form>
    <div>
        <?php 
            if(isset($_GET['submit'])) {
                $xoredMess = XorMessage($_GET['key'], $_GET['message']);
                echo htmlentities($xoredMess);
                echo "<br>";
                $original = XorMessage($_GET['key'], $xoredMess);
                echo $original;
            };
        ?>
    </div>
</body>
</html>