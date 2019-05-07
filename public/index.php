<?php

echo "Hello World";
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Poll</title>
</head>

<body>
    <h1>Which do you like best?</h1>
    <form action="" method="post">
        <div class="row">
            <div class="box" id="box_0" data-id="0"></div>
            <div class="box" id="box_1" data-id="1"></div>
            <div class="box" id="box_2" data-id="2"></div>
        </div>
        <div id="btn">Vote and See Results</div>
    </form>
</body>

</html>