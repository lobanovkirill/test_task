<?php

/**
 * Модель целяется только из контроллеров, поэтому такой URL у интерфейса
 */
require_once("./../interfaces/CourierDB.interface.php");

class CourierDBModel implements CourierDBInterface
{
    private $connect_DB;
    function __construct()
    {
        $this->connect_DB = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        if (!$this->connect_DB) {
            echo json_encode(['error' => 1, "message" => "Не могу подключиться к базе данных..."]);
            return;
        }
    }

    function __destruct()
    {
        mysqli_close($this->connect_DB);
    }

    function getCourierByID(int $id)
    {
        $sql = "SELECT id, courier_name FROM courier WHERE id={$id}";
        $result = mysqli_query($this->connect_DB, $sql);
        if (!$result) return false;
        $row = mysqli_fetch_row($result);
        if (!$row) return [];
        return $row;
    }

    function getAllCouriers()
    {
        $sql = "SELECT id, courier_name FROM courier";
        $result = mysqli_query($this->connect_DB, $sql);
        if (!$result) return false;
        return mysqli_fetch_all($result, MYSQLI_NUM);
    }

    function getAllRegions()
    {
        $sql = "SELECT id, city, travel_time FROM region";
        $result = mysqli_query($this->connect_DB, $sql);
        if (!$result) return false;
        return mysqli_fetch_all($result, MYSQLI_NUM);
    }

    function getScheduleOnDate(string $date_start, string $date_finish): array
    {
        $sql = "SELECT t.id, t.date_start, t.date_finish, c.courier_name, r.city, r.travel_time FROM travel_data t JOIN courier c ON t.courier_id=c.id JOIN region r ON t.region_id=r.id WHERE t.date_start >= '{$date_start}' AND t.date_finish <= '{$date_finish}';";
        $result = mysqli_query($this->connect_DB, $sql);
        if (!$result) return [];
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    function getRegionData(int $region_id): array
    {
        $sql = "SELECT id, city, travel_time FROM region WHERE id={$region_id}";
        $result = mysqli_query($this->connect_DB, $sql);
        $row = mysqli_fetch_row($result);
        if (!$row) return [];
        return $row;
    }
    function checkFreeStatusCourier(string $date_start, string $date_finish, int $courier_id)
    {
        $sql = "SELECT id FROM travel_data WHERE (courier_id)={$courier_id} 
                    AND UNIX_TIMESTAMP(date_start) <= '{$date_finish}'
                    AND UNIX_TIMESTAMP(date_finish) >= '{$date_start}'";
        $result = mysqli_query($this->connect_DB, $sql);
        $row = mysqli_fetch_array($result);
        if ($row) return $row;
        return [];
    }
    function addNewTravelCourier(string $date_start, string $date_finish, int $region_id, int $courier_id)
    {

        $sql = "INSERT INTO `travel_data` (`date_start`, `date_finish`, `region_id`, `courier_id`)
                VALUES (?, ?, ?, ?)";

        if (!$stmt = mysqli_prepare($this->connect_DB, $sql))
            return false;
        mysqli_stmt_bind_param($stmt, "ssii", $date_start, $date_finish, $region_id, $courier_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    }
    function addNewCourier($name)
    {
        $sql = "INSERT INTO `courier` (`courier_name`) VALUES (?)";
        if (!$stmt = mysqli_prepare($this->connect_DB, $sql))
            return false;
        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    }
}
