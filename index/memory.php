<?php
// top.phpからコピー（textUpdate();）
function readMemory() {
    $readFile = fopen('../data/memory.txt', 'r');
    while ($read = fgets($readFile)) {
        $length = mb_strlen($read) - 1;
        // 文字の長さによって、動きを変える(.addclass)
        if ($length === 1) {
            echo "<div class=one flex>";
            echo nl2br($read);
            echo "</div>";
        } else if ($length === 2) {
            echo "<div class=two flex>";
            echo nl2br($read);
            echo "</div>";
        } else if ($length === 3) {
            echo "<div class=three flex>";
            echo nl2br($read);
            echo "</div>";   
        } else {
            $random = rand(1,3);
            if ($random === 1) {
                echo "<div>";
                echo nl2br($read);
                echo "</div>";  
            } else if ($random === 2) {
                echo "<div class=blinking flex>";
                echo nl2br($read);
                echo "</div>";  
            } else {
                echo "<div class=purun flex>";
                echo nl2br($read);
                echo "</div>"; 
            }
        }
    }
    fclose($openFile);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/top.css">
    <title>Document</title>
</head>
<body>
    <h1>大切な文字たち</h1>
    <div class="flex">
        <?= readMemory() ?>
    </div>

    <form action="top.php">
        <button>戻る</button>
    </form>

</body>
</html>