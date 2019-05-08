<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Poll.php');

try {
    $poll = new \MyApp\Poll();
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

$results = $poll->getResults();
// var_dump($results);
// exit;
// $results = [
//     0 => 12,
//     1 => 24,
//     2 => 36
// ];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $poll->post();
}


$err = $poll->getError();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Poll Result</title>
</head>

<body>

    <h1>Result...</h1>
    <div class="row">
        <?php for ($i = 0; $i < 3; $i++) : ?>
            <div class="box" id="box_<?= h($i); ?>"><?= h($results[$i]); ?></div>
        <?php endfor; ?>
    </div>
    <a href="/">
        <div id="btn">Go back</div>
    </a>
</body>

</html>