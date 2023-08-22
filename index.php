<?php
ini_set('display_errors', 1);

$minPHPVersion = '7.4';
if (version_compare(PHP_VERSION, $minPHPVersion, '<')) {
  die("Ваша версия PHP должна быть {$minPHPVersion} или выше. Текущая версия: " . PHP_VERSION);
}
unset($minPHPVersion);

require_once("./routers/Main.router.php");

$router = new MainRouter();

?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Расписание курьеров</title>
  <link rel="stylesheet" href="public/styles/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
</head>

<body>
  <?php
  $router->showPage($_SERVER["QUERY_STRING"]);
  ?>
</body>
<script src="./public/js/helpers.js"></script>
<script src="./public/js/changeDateStart.js"></script>
<script src="./public/js/changeArrivedDate.js"></script>
<script src="./public/js/getListRegions.js"></script>
<script src="./public/js/getListCouriers.js"></script>

<script src="./public/js/addTravelCourier.js"></script>
<script src="./public/js/getAllScheduleOnDate.js"></script>
<script src="./public/js/changeDateGetAllSchedule.js"></script>


</html>