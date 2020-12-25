<?php
function delete() {
    $file = fopen('../data/data.txt', 'w+');
    fclose($file);
}
delete();

function message() {
    $head = rand(1,2);
    $body = rand(1,2);
    $foot = rand(1,2);
    if ($head == 1) {
        $head = "こんにちは、";
    } else {
        $head = "こんばんは、";
    }

    if ($body == 1) {
        $body = "また、";
    } else {
        $body = "たまごっち、";
    }

    if ($foot == 1) {
        $foot = "あそぼう！";
    } else {
        $foot = "さいこう！";
    }
    return $head . $body . $foot;
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

    <h1>きおくになりました</h1>

    <form action="top.php">
        <button>戻る</button>
    </form>

    <?= message() ?>

<script src="../main.js/top.js" ></script>
</body>
</html>
