<h2>Расписание поездок курьеров</h2>

<p>Чтобы заполнить базу тестовыми данными, нажмите <a href="/index.php?page=test_data">здесь</a></p>
<div class="error_message"></div>

<h3>Внесение данных в расписание</h3>
<form id="add_travel_for_courier">
    <div>
        <label for="travel_region">Регион поездки</label>
        <select id="travel_region" name="region" required>
            <option value="0">Выберите город</option>
        </select>
    </div>
    <div>
        <label for="from_city_date">Дата выезда из Москвы</label>
        <input type="datetime-local" value="<?php echo date("Y-m-d", time()); ?>T00:00" min="<?php echo date("Y-m-d", time()); ?>T00:00" id="from_city_date" name="from_city_date" required>
    </div>
    <div>
        <label for="listCouriers">Выберите курьера</label>
        <select id="listCouriers" name="courier" required>
            <option value="0">Выберите курьера</option>
        </select>
    </div>
    <div>
        <label for="arrive_date">Дата прибытия в город</label>
        <input type="text" disabled name="arrive_date" id="arrive_date">
    </div>
    <div>
        <button type="submit" id="add_new_trip_btn">Добавить в расписание</button>
    </div>
</form>


<h3>Расписания поездок в регионы за период:</h3>
<form id="show_scheduled_data">
    <div>
        <label for="data_scheduled">С</label>
        <input type="datetime-local" value="<?php echo date("Y-m-d", time()); ?>T00:00" name="start_time" class="filter_timePicker" id="start_time" min="" max="">
    </div>
    <div>
        <label for="data_scheduled">По</label>
        <input type="datetime-local" value="<?php echo date("Y-m-d", time()); ?>T00:00" name="end_time" class="filter_timePicker" id="end_time" min="" max="">
    </div>

    <button type="submit" id="filter_scheduled_dates">Показать</button>

</form>
<div class="scheduled_data">
</div>