<?php
ini_set('display_errors', 1);
require_once("./../helpers/URL.helper.php");

// if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     $urlHelper_travel = new URLHelper();
//     $urlHelper_travel->show404page("./../views/");
//     exit;
// }

require_once("./../config.php");
require_once("./../helpers/CleanData.helper.php");
require_once("./../helpers/DateTime.helper.php");
require_once("./../models/CourierDB.model.php");

$courierDBModelGenerate = new CourierDBModel();
$cleanDataGenerate = new CleanDataHelper();
$dateTimeHelperGenerate = new DateTimeHelper();

$names = [
    "Иван Петров",
    "Василий Везучев",
    "Салават Анваров",
    "Олег Ахметов",
    "Константин Викторов",
    "Салават Анваров",
    "Артем Васильев",
    "Григорий Патрушев",
    "Норбек Давлетгареев",
    "Станислав Хафизов"
];

function addNewCouriers($courierDBModelGenerate, $names)
{
    foreach ($names as $name) {
        $courierDBModelGenerate->addNewCourier($name);
    }
}

createContent($courierDBModelGenerate);

function createContent($courierDBModelGenerate)
{
    $records = 5;
    $regions = $courierDBModelGenerate->getAllRegions();

    for ($i = 0; $i < $records; $i++) {

        $date = randomDate(mt_rand(1, 23));
        $couriers = $courierDBModelGenerate->getAllCouriers();
        $lenghtCouriersArr = count($couriers);
        $statusCoorier = $courierDBModelGenerate->checkFreeStatusCourier(
            $date[0],
            $date[1],
            $couriers[mt_rand(0, $lenghtCouriersArr)]
        );
    }
}

function randomDate($rand)
{
    $dateStart = strtotime('2020-01-01 00:00:00');
    $dateFinish  = strtotime('2023-08-01 00:00:00');
    $randomStamp = rand($dateStart, $dateFinish);
    $date_to = date("Y-m-d H:i", $randomStamp);
    $date_from = date("Y-m-d H:i", strtotime("+ $rand hours", $randomStamp));
    return [$date_to, $date_from];
}
