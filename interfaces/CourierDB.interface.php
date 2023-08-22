<?php

/**
 * Interface CourierDBInterface содержит основные методы для работы с расписанием поездок курьеров
 */

interface CourierDBInterface
{
    /**
     * @return array - Возвращает массив всех регионов
     */
    function getAllRegions();

    /**
     * Выборка всех курьеров или одного курьера на указанную дату находящихся в пути
     * @param string $date - дата
     * @param int $courier_id - идентификатор курьера
     * 
     * @return array - Возвращает массив
     */
    function getScheduleOnDate(string $date_start, string $date_finish): array;

    /**
     * Получаем данные региона
     * @return array - Возращает массив
     */
    function getRegionData(int $region_id): array;

    /**
     * Добавление новой поездки курьера
     * @param string $date_start - дата выезда курьера в пункт назначения
     * @param string $date_arrive - дата приезда курьера в пункт назначения
     * @param int $region_id - идентификатор региона куда поедет курьер
     * @param int $courier_id - идентификатор курьера
     * 
     * @return boolean - результат успех/ошибка
     */
    function addNewTravelCourier(string $date_start, string $date_finish, int $region_id, int $courier_id);
}
