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
require_once("./../models/CourierDB.model.php");

$courierDBModel = new CourierDBModel();
$result = $courierDBModel->getAllCouriers();
if ($result) {
    echo json_encode(["error" => 0, "message" => "", "result" => $result]);
    return;
}
echo json_encode(['error' => 1, "message" => "К сожалению не удалось выбрать данные..."]);
return;

unset($urlHelper);
unset($courierDBModel);
