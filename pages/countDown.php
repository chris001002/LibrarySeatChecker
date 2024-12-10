<?php


require_once($_SERVER['DOCUMENT_ROOT'] . "/index.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/database.php");
$database = new Database();
$time = $database->timeRemaining($_SESSION['user']['id']);
if (isset($_POST["userId"])) {
    $database->stopSession($_POST["userId"]);
}
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
            console.log(time);
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
    <script>
        function stopSession() {
            $.ajax({
                type: "POST",
                url: "/seats",
                data: {
                    userId: "<?= $_SESSION['user']['id'] ?>"
                },
                success: function(data) {
                    window.location.href = "/seats";
                }
            });
        }
    </script>
</head>

<body class="flex min-h-screen flex-col dark:bg-slate-800">
    <?php
    if (isset($_SESSION["extend"])) {
        unset($_SESSION["extend"]);
    ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Successfully extended your session',
                confirmationButtonText: 'Close'
            })
        </script>
    <?php
    }
    ?>
    <?php require_once("nav.php") ?>
    <div class="flex items-center justify-center flex-grow">
        <div class="grid place-items-center text-wrap bg-white dark:bg-slate-900 bg-opacity-75 dark:bg-opacity-75 p-8 rounded-lg shadow-lg">
            <header class="text-center mb-5">
                <div class="flex items-center gap-x-fixed-md justify-center">
                    <h1 class="text-blue-600 text-2xl">Time Remaining: <span id="time"></span></h1>

                </div>
                <div class="flex items-center gap-x-fixed-md text-3xl justify-center">
                    <p class="text-black dark:text-white" id="countDown"></p>
                </div>
            </header>
            <button type="button" onclick="stopSession()" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Stop Session</button>
        </div>
</body>

</html>