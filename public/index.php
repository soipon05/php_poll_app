<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Poll.php');

try {
    $poll = new \MyApp\Poll();
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $poll->post();
}

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
            <input type="hidden" name="answer" id="answer" value="">
        </div>
        <div id="btn">Vote and See Results</div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $(function() {
            'use strict';

            $('.box').on('click', function() {
                $('.box').removeClass('selected');
                $(this).addClass('selected');
                $('#answer').val($(this).data('id'));
            });

            $('#btn').on('click', function() {
                if ($('#answer').val() === '') {
                    alert('Choose One!');
                } else {
                    $('form').submit();
                }
            });
        });
    </script>
</body>

</html>