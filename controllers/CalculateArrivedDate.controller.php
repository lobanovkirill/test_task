<?php
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $urlHelper = new URLHelper();
    $urlHelper->show404page("./../views/");
    exit;
}

require_once("./../config.php");
require_once("./../helpers/CleanData.helper.php");
require_once("./../helpers/DateTime.helper.php");
require_once("./../models/CourierDB.model.php");

if ($_POST["from_city_date"] == "") {
    echo json_encode(['error' => 1, "message" => "Пожалуйста введите корректные дату."]);
    return;
} elseif ($_POST["region_id"] == "" || (int)$_POST["region_id"] == 0) {
    echo json_encode(['error' => 1, "message" => "Пожалуйста выберите корректный город."]);
    return;
}

$courierDBModel = new CourierDBModel();
$cleanData = new CleanDataHelper();
$dateTimeHelper = new DateTimeHelper();

$date_start = $cleanData->clearStr($_POST["from_city_date"]);
$region_id = $cleanData->clearInt($_POST["region_id"]);

$date_start = $dateTimeHelper->reformatTime($date_start);

$result = $courierDBModel->getRegionData($region_id);
if (!$result) {
    echo json_encode(['error' => 1, "message" => "К сожалению не удалось выбрать данные..."]);
    return;
}

$date_finish = $dateTimeHelper->plusDays($date_start, $result[2]);
$date_result = $dateTimeHelper->ru_RU_TimeFormat($date_finish);
echo json_encode(["error" => 0, "message" => "", "result" => ["data" => $date_result]]);
return;

unset($urlHelper);
unset($courierDBModel);
unset($cleanData);
unset($dateTimeHelper);
