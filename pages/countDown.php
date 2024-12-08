<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Count Down</title>
    <link rel="stylesheet" href="output.css">
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</head>

<body class="flex min-h-screen flex-col dark:bg-slate-800">
    <?php require_once("nav.php") ?>
    <div class="flex items-center justify-center flex-grow">
        <div class="grid place-items-center text-wrap bg-white dark:bg-slate-900 bg-opacity-75 dark:bg-opacity-75 p-8 rounded-lg shadow-lg">
            <header class="text-center">
                <div class="flex items-center gap-x-fixed-md justify-center">
                    <h1 class="text-blue-600 text-2xl">Time Remaining:</h1>
                </div>
                <div class="flex items-center gap-x-fixed-md text-3xl justify-center">
                    <p class="text-black dark:text-white" id="countDown"></p>
                </div>
            </header>
        </div>
</body>

</html>