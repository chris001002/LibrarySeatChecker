<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="output.css">
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#password").on("input", ((e) => {
                let password = $("#password").val();
                if (password.length < 8) {
                    $("#password-errors").children()[0].classList.remove("hidden");
                } else if (!$("#password-errors").children()[0].classList.contains("hidden")) {
                    $("#password-errors").children()[0].classList.add("hidden");
                }
                if (!password.match(/^(?=.*[a-z])(?=.*[A-Z]).+$/)) {
                    $("#password-errors").children()[1].classList.remove("hidden");
                } else if (!$("#password-errors").children()[1].classList.contains("hidden")) {
                    $("#password-errors").children()[1].classList.add("hidden");
                }
                if (password.match(/[\s;]/)) {
                    $("#password-errors").children()[2].classList.remove("hidden");
                } else if (!$("#password-errors").children()[2].classList.contains("hidden")) {
                    $("#password-errors").children()[2].classList.add("hidden");
                }
            }));
            $("#student_id").focusout((e) => {
                let student_id = $("#student_id").val();
                if (isNaN(student_id)) {
                    $("#student_id-errors").children()[0].classList.remove("hidden");
                } else if (!$("#student_id-errors").children()[0].classList.contains("hidden")) {
                    $("#student_id-errors").children()[0].classList.add("hidden");
                }
                if (student_id.length != 12) {
                    $("#student_id-errors").children()[1].classList.remove("hidden");
                } else if (!$("#student_id-errors").children()[1].classList.contains("hidden")) {
                    $("#student_id-errors").children()[1].classList.add("hidden");
                }
            })
        })
    </script>
</head>

<body class="min-h-screen h-fit flex flex-col">
    <?php require_once("nav.php") ?>


    <div class=" flex-grow grid place-items-center">
        <form class="mx-auto md:w-1/4" method="post" action="/addUser">
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input name="email" type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@domain.com" required />
            </div>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input name="name" type="text" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="John Doe" required />
            </div>
            <div class="mb-5">
                <label for="student_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student ID</label>
                <input name="student_id" type="text" id="student_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required placeholder="001202200001" pattern="^\d{12}$" />
                <ul class="box-border list-inside" id="student_id-errors">
                    <li type="disc" class="hidden text-red-500">StudentID must only contain numbers</li>
                    <li type="disc" class="hidden text-red-500">StudentID must be 12 characters long</li>
                </ul>
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                <input name="password" type="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" pattern="^(?=.*[a-z])(?=.*[A-Z])[^ ;]{8,}$" required placeholder="Password" />
                <ul class="box-border list-inside" id="password-errors">
                    <li type="disc" class="hidden text-red-500">Password must be at least 8 characters long</li>
                    <li type="disc" class="hidden text-red-500">Password must contain at least one uppercase letter and one lowercase letter</li>
                    <li type="disc" class="hidden text-red-500">Password must not contain spaces and semicolons</li>
                </ul>
            </div>
            <button name="submit" type="submit" value="true" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register new account</button>
        </form>
    </div>

</body>

</html>