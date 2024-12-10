<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="output.css">
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</head>

<body class="h-screen overflow-hidden bg-slate-300 dark:bg-slate-800">
    <?php require_once("nav.php") ?>
    <div class="flex flex-col items-center justify-center h-full">
        <div class="max-w-lg text-center px-4">
            <header>
                <h1 class="text-blue-600 dark:text-sky-400 text-2xl font-semibold">About Us</h1>
            </header>
            <div class="flex items-center gap-x-fixed-md text-color-blue-700 text-3xl justify-center dark:text-white">
                <p>Learn more about this website</p>
            </div>
        </div>
        <div class="max-w-lg text-center mt-6 space-y-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                Welcome to our library seat checker website! Our objective is to provide a tool that is easy to use and great for user experience.
            </p>
            <p class="text-lg text-gray-700 dark:text-gray-300">
                Our team is committed to excellence and improving upon user experience. We strive to innovate and improve our services continuously. Thank you for choosing us!
            </p>
        </div>
    </div>
</body>

</html>