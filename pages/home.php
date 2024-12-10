<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="output.css">
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script>
        function go() {
            if ("<?= isset($_SESSION['user']) ?>" == "1") {
                window.location.href = "/seats";
            } else {
                window.location.href = "/log_in";
            }
        }
    </script>
</head>

<body class="bg-[url('img/library2.jpg')] bg-no-repeat bg-center bg-fixed bg-cover relative flex flex-col h-screen">
    <?php require_once("nav.php") ?>
    <div class="flex items-center justify-center flex-grow dark:bg-black dark:bg-opacity-50">
        <div class="grid place-items-center text-wrap bg-white dark:bg-slate-900 bg-opacity-75 dark:bg-opacity-75 p-8 rounded-lg shadow-lg">
            <header class="text-center">
                <div class="flex items-center gap-x-fixed-md justify-center">
                    <h1 class="text-blue-600 dark:text-sky-400 text-2xl">Welcome to Our Website</h1>
                </div>
                <div class="flex items-center gap-x-fixed-md text-3xl justify-center">
                    <p class="text-black dark:text-white">Easily book and check seat availability through any devices</p>
                </div>
            </header>

            <!-- Form with submit button -->
            <button onclick="go()" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-sky-500 dark:hover:bg-sky-600 dark:focus:ring-sky-300 my-8">
                Go Now ->
            </button>

        </div>
    </div>

</body>

</html>