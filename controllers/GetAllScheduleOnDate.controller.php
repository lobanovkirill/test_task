<?php
ini_set('display_errors', 1);
require_once("./../helpers/URL.helper.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $urlHelper = new URLHelper();
    $urlHelper->show404page("./../views/");
    exit;
}

require_once("./../config.php");
require_once("./../helpers/CleanData.helper.php");
require_once("./../helpers/DateTime.helper.php");
require_once("./../models/CourierDB.model.php");

$courierDBModel = new CourierDBModel();
$cleanData = new CleanDataHelper();
$dateTimeHelper = new DateTimeHelper();

$date_start = $cleanData->clearStr($_POST["start_time"]);
$date_end = $cleanData->clearStr($_POST["end_time"]);

$date_start = $dateTimeHelper->reformatTime($date_start);
$date_end = $dateTimeHelper->reformatTime($date_end);

$result = $courierDBModel->getScheduleOnDate($date_start, $date_end);
echo json_encode(["error" => 0, "message" => "", "result" => $result]);
exit;
if (!$result) {
    echo json_encode(['error' => 1, "message" => "Ничего не найдено..."]);
    return;
} else {
    echo json_encode(["error" => 0, "message" => "", "result" => $result]);
    return;
}

unset($urlHelper);
unset($courierDBModel);
unset($cleanData);
unset($dateTimeHelper);
