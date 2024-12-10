<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/index.php");
$invalid = false;
if (isset($_POST['submit'])) {
    require_once($_SERVER['DOCUMENT_ROOT'] . "/database.php");
    $email = $_POST['email'];
    $password = $_POST['password'];
    $database = new Database();
    if ($database->log_in($email, $password)) {
        $user = $database->log_in($email, $password);
        if ($user == -1) $invalid = true;
        else {
            $_SESSION['user'] = $user;
            header("Location: /");
        }
?>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
<?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="output.css">
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</head>

<body class="min-h-screen h-fit flex flex-col dark:bg-slate-800">
    <?php require_once("nav.php") ?>
    <?php
    if ($invalid) { ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid credentials',
                confirmationButtonText: 'Close'
            })
        </script>
    <?php }
    ?>
    <div class=" flex-grow grid place-items-center">
        <form class="mx-auto md:w-1/4" method="post" action="/log_in">
            <h1 class="block text-3xl font-extrabold dark:text-white text-center w-full mb-3">Log In</h1>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input name="email" type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@domain.com" required />
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                <input name="password" type="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required placeholder="Password" />
            </div>
            <p class="mb-5 dark:text-white">Don't have an account? Click here to <a href="/sign_up" class="text-blue-600 dark:text-sky-300 hover:underline">Sign Up</a></p>
            <button name="submit" type="submit" value="true" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Log In</button>
        </form>
    </div>

</body>

</html>