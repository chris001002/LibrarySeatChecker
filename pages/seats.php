<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/index.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/database.php");
function evaluateColor($userId)
{
	$class = null;
	if ($userId == null) {
		$class = "md:mx-auto w-full max-w-10 mb-2 text-white bg-lime-500 hover:bg-lime-800 focus:ring-4 focus:ring-lime-300 font-medium text-sm px-1 py-1 dark:bg-lime-600 dark:hover:bg-lime-700 focus:outline-none dark:focus:ring-lime-800";
	} else {
		$class = "md:mx-auto w-full max-w-10 mb-2 text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium text-sm px-1 py-1 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800";
	}
	return $class;
}
$database = new Database();
$seats = $database->getAllSeats();
$i = -1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Check Seats</title>
	<link rel="stylesheet" href="output.css" />
	<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="min-h-screen h-fit flex flex-col dark:bg-slate-800">
	<?php require_once("nav.php") ?>
	<div class="block">
		<h1 class="block text-3xl font-extrabold dark:text-white text-center w-full my-5">Adam Kurniawan's Library Map</h1>
		<div class="flex flex-wrap">
			<div class="w-5/12 bg-gray-700 text-white flex font-bold justify-center items-center h-14">Office</div>
			<div class="w-2/12"></div>
			<div class="w-5/12 bg-gray-700 text-white flex font-bold justify-center items-center h-14">Information</div>
			<div class="grid grid-cols-12 mx-2 w-full my-2">
				<div class="flex flex-col py-3 mr-2">
					<?php
					for ($_i = 0; $_i < 5; $_i++) {
					?>
						<button type="button" class="<?= evaluateColor($seats[++$i]["userId"]) ?>" <?= $seats[$i]["userId"] == null ? "" : "disabled" ?>><?= $seats[$i]["location"] ?></button>
					<?php
					}
					?>
				</div>
				<div class="[writing-mode:vertical-rl] h-full text-center bg-gray-700 text-white font-bold mr-2 flex justify-center items-center md:text-2xl">
					Table
				</div>
				<div class="flex flex-col py-3 mr-2">
					<?php
					for ($_i = 0; $_i < 5; $_i++) {
					?>
						<button type="button" class="<?= evaluateColor($seats[++$i]["userId"]) ?>" <?= $seats[$i]["userId"] == null ? "" : "disabled" ?>><?= $seats[$i]["location"] ?></button>
					<?php
					}
					?>
				</div>
				<div class="flex flex-col py-3 mr-2">
					<?php
					for ($_i = 0; $_i < 5; $_i++) {
					?>
						<button type="button" class="<?= evaluateColor($seats[++$i]["userId"]) ?>" <?= $seats[$i]["userId"] == null ? "" : "disabled" ?>><?= $seats[$i]["location"] ?></button>
					<?php
					}
					?>
				</div>
				<div class="[writing-mode:vertical-rl] h-full text-center bg-gray-700 text-white font-bold mr-2 flex justify-center items-center md:text-2xl">
					Table
				</div>
				<div class="flex flex-col py-3 mr-2">
					<?php
					for ($_i = 0; $_i < 5; $_i++) {
					?>
						<button type="button" class="<?= evaluateColor($seats[++$i]["userId"]) ?>" <?= $seats[$i]["userId"] == null ? "" : "disabled" ?>><?= $seats[$i]["location"] ?></button>
					<?php
					}
					?>
				</div>
				<div class="flex flex-col py-3 mr-2">
					<?php
					for ($_i = 0; $_i < 5; $_i++) {
					?>
						<button type="button" class="<?= evaluateColor($seats[++$i]["userId"]) ?>" <?= $seats[$i]["userId"] == null ? "" : "disabled" ?>><?= $seats[$i]["location"] ?></button>
					<?php
					}
					?>
				</div>
				<div class="[writing-mode:vertical-rl] h-full text-center bg-gray-700 text-white font-bold mr-2 flex justify-center items-center md:text-2xl">
					Table
				</div>
				<div class="flex flex-col py-3 mr-2">
					<?php
					for ($_i = 0; $_i < 5; $_i++) {
					?>
						<button type="button" class="<?= evaluateColor($seats[++$i]["userId"]) ?>" <?= $seats[$i]["userId"] == null ? "" : "disabled" ?>><?= $seats[$i]["location"] ?></button>
					<?php
					}
					?>
				</div>
				<div class="flex flex-col py-3 mr-2">
					<?php
					for ($_i = 0; $_i < 5; $_i++) {
					?>
						<button type="button" class="<?= evaluateColor($seats[++$i]["userId"]) ?>" <?= $seats[$i]["userId"] == null ? "" : "disabled" ?>><?= $seats[$i]["location"] ?></button>
					<?php
					}
					?>
				</div>
				<div class="[writing-mode:vertical-rl] h-full text-center bg-gray-700 text-white font-bold mr-2 flex justify-center items-center md:text-2xl">
					Table
				</div>
				<div class="flex flex-col py-3 mr-2">
					<?php
					for ($_i = 0; $_i < 5; $_i++) {
					?>
						<button type="button" class="<?= evaluateColor($seats[++$i]["userId"]) ?>" <?= $seats[$i]["userId"] == null ? "" : "disabled" ?>><?= $seats[$i]["location"] ?></button>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="mx-5 dark:text-white">
		Legend:
		<div class="flex items-center">
			<div class="border-solid border-2 border-black dark:border-white mt-2 h-5 mr-2 w-full max-w-5 mb-2 text-white bg-lime-500 font-medium text-sm divx-1 py-1 dark:bg-lime-600 dark:hover:bg-lime-700"></div>
			Available
		</div>
		<div class="flex items-center">
			<div class="border-solid border-2 border-black dark:border-white mt-2 h-5 mr-2 w-full max-w-5 mb-2 text-white bg-red-500 font-medium text-sm divx-1 py-1 dark:bg-red-600 dark:hover:bg-red-700"></div>
			Occupied
		</div>
	</div>
</body>

</html>