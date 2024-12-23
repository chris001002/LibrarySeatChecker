<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://upload.wikimedia.org/wikipedia/en/a/ae/President_University_Logo.png" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Library Seat Checker</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" class="flex text-sm bg-gray-800 dark:bg-gray-400 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-sky-400" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="/img/Guest.png" alt="user photo" srcset="/img/Guest.png" class="dark:src('/img/Guest_Dark.png')">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                <div class="px-4 py-3">
                    <?php
                    $username = 'Guest';
                    $email = '';
                    if (isset($_SESSION['user']['id'])) {
                        $username = $_SESSION['user']['name'];
                        $email = $_SESSION['user']['email'];
                    }
                    ?>
                    <span class="block text-sm text-gray-900 dark:text-white"><?= $username ?></span>
                    <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"><?= $email ?></span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="/sign_out" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="/sign_up" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign up</a>
                            <a href="/log_in" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Log in</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <?php $current_page = basename($_SERVER['PHP_SELF']); ?>
                <li>
                    <a href="/" class="block py-2 px-3 rounded md:p-0 <?= $current_page === 'index.php' ? 'text-blue-700 dark:text-sky-400' : 'text-gray-900 dark:text-white' ?>" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="/about" class="block py-2 px-3 rounded md:p-0 <?= $current_page === 'about' ? 'text-blue-700 dark:text-sky-400' : 'text-gray-900 dark:text-white' ?>">About</a>
                </li>
                <li>
                    <a href="/seats" class="block py-2 px-3 rounded md:p-0 <?= $current_page === 'seats' ? 'text-blue-700 dark:text-sky-400' : 'text-gray-900 dark:text-white' ?>">Check seats</a>
                </li>
            </ul>
        </div>
    </div>
</nav>