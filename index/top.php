<?php

// 入力した文字をファイルへ格納
function textUpdate() {
    // 入力した値を変数に代入
    $chooseWord = $_GET["chooseword"];
    $file = fopen('../data/data.txt', 'a');
    fwrite($file, $chooseWord . "\n");
    fclose($file);
    $memory = fopen('../data/memory.txt', 'a');
    fwrite($memory, $chooseWord . "\n");
    fclose($memory);
}
textUpdate();

// ファイルから読み込んだ文字を出力する
function textExpression() {
    $openFile = fopen('../data/data.txt', 'r+');
    while ($line = fgets($openFile)) {
        $length = mb_strlen($line) - 1;
        // 文字の長さによって、動きを変える(.addclass)
        if ($length === 1) {
            echo "<div class=one>";
            echo nl2br($line);
            echo "</div>";
        } else if ($length === 2) {
            echo "<div class=two>";
            echo nl2br($line);
            echo "</div>";
        } else if ($length === 3) {
            echo "<div class=three>";
            echo nl2br($line);
            echo "</div>";   
        } else {
            $random = rand(1,3);
            if ($random === 1) {
                echo "<div>";
                echo nl2br($line);
                echo "</div>";  
            } else if ($random === 2) {
                echo "<div class=blinking>";
                echo nl2br($line);
                echo "</div>";  
            } else {
                echo "<div class=purun>";
                echo nl2br($line);
                echo "</div>"; 
            }
        }
    }
    fclose($openFile);
}

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/top.css">
        <title>Document</title>
    </head>

    <body>
        <div class="center">
            <h1>文字っち</h1>
            <div class="flex">
            <form method="GET">
                <input type="text" name="chooseword">
            </form>
            <br/>
            <form action="delete.php">
                <button>はじめから</button>
            </form>
            <form action="memory.php">
                <button>きおくをみる</button>
            </form>
            </div>
        </div>

        <!-- <h2>色</h2>
        <label>
            <input type="color" id="color" name="color" value="#ff0000">
        </label>

        <form action="index.php">
            <button class="decision">決定</button>
        </form> -->

        <h3>飼育ボックス</h3>
        <div class="showBox">
            <div>
                <span> <?=  textExpression() ?> </span>
            </div>
        </div>

        <script src="../main.js/top.js"></script>
    </body>

</html>