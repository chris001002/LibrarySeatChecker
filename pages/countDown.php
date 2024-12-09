<?php


require_once($_SERVER['DOCUMENT_ROOT'] . "/index.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/database.php");
$time = $database->timeRemaining($_SESSION['user']['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Count Down</title>
    <link rel="stylesheet" href="output.css">
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            let time = new Date('<?= $time ?>');
            setInterval(function() {
                let current = new Date();
                let diff = time.getTime() - current.getTime();
                let seconds = Math.floor(diff / 1000);
                let minutes = Math.floor(seconds / 60);
                let hours = Math.floor(minutes / 60);
                let days = Math.floor(hours / 24);
                hours = hours - (days * 24);
                minutes = minutes - (days * 24 * 60) - (hours * 60);
                seconds = seconds - (days * 24 * 60 * 60) - (hours * 60 * 60) - (minutes * 60);
                $('#time').html(minutes + "m " + seconds + "s");
            }, 1000);
        })
    </script>
</head>

<body class="flex min-h-screen flex-col dark:bg-slate-800">
    <?php require_once("nav.php") ?>
    <div class="flex items-center justify-center flex-grow">
        <div class="grid place-items-center text-wrap bg-white dark:bg-slate-900 bg-opacity-75 dark:bg-opacity-75 p-8 rounded-lg shadow-lg">
            <header class="text-center">
                <div class="flex items-center gap-x-fixed-md justify-center">
                    <h1 class="text-blue-600 text-2xl">Time Remaining: <span id="time"></span></h1>

                </div>
                <div class="flex items-center gap-x-fixed-md text-3xl justify-center">
                    <p class="text-black dark:text-white" id="countDown"></p>

                </div>
            </header>
        </div>
</body>

</html>