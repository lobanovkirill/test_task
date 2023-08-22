<?php
ini_set('display_errors', 1);
require_once("./../helpers/URL.helper.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $urlHelper_travel = new URLHelper();
    $urlHelper_travel->show404page("./../views/");
    exit;
}

require_once("./../config.php");
require_once("./../helpers/CleanData.helper.php");
require_once("./../helpers/DateTime.helper.php");
require_once("./../models/CourierDB.model.php");

if (!is_string($_POST["region"]) or !is_string($_POST["from_city_date"]) or !is_string($_POST["courier"])) {
    echo json_encode(['error' => 1, "message" => "Пожалуйста введите корректные данные."]);
    return;
}

$courierDBModelTravel = new CourierDBModel();
$cleanDataTravel = new CleanDataHelper();
$dateTimeHelperTravel = new DateTimeHelper();

$dateStartTravel = $cleanDataTravel->clearStr($_POST["from_city_date"]);
$regionDateTravelID = $cleanDataTravel->clearInt($_POST["region"]);
$courierIdTravel = $cleanDataTravel->clearInt($_POST["courier"]);

if (!$courierIdTravel) {
    echo json_encode(['error' => 1, "message" => "Неверные данные курьера, выберите пункт из выпадающего списка."]);
    return;
}

//выбираем все данные региона для последующего расчета даты окончания поездки
$regionDateTravel = $courierDBModelTravel->getRegionData($regionDateTravelID);
if (!$regionDateTravel) {
    echo json_encode(['error' => 1, "message" => "Произошли проблемы с выборкой региона"]);
    return;
}

$dateStartTravelFormated = $dateTimeHelperTravel->reformatTime($dateStartTravel);
$dateFinishTravel = $dateTimeHelperTravel->plusDays($dateStartTravelFormated, $regionDateTravel[2]);
if (!$dateStartTravelFormated || !$dateFinishTravel) {
    echo json_encode(['error' => 1, "message" => "Неправильные форматы времени."]);
    return;
}

$checkStatusCourier = $courierDBModelTravel->checkFreeStatusCourier(
    strtotime($dateStartTravel),
    strtotime($dateFinishTravel),
    $courierIdTravel
);

if ($checkStatusCourier) {
    echo json_encode(['error' => 1, "message" => "Данный курьер в поездке, выберите другого."]);
    return;
}

// Добавляем курьера в базу
$resultAddCourier = $courierDBModelTravel->addNewTravelCourier(
    $dateStartTravelFormated,
    $dateFinishTravel,
    $regionDateTravel[2],
    $courierIdTravel
);

if ($resultAddCourier) {
    echo json_encode(['error' => 0, "message" => "Поездка добавлена в базу."]);
    return;
} else {
    echo json_encode(['error' => 1, "message" => "Не смогли добавить поездку в базу."]);
    return;
}
