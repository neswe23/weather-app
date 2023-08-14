<?php
$apiKey = "1d1b94c8465c75d6177bc3193f4384d6";
$cityId = "524894";
$apiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=ru&units=metric&APPID=" . $apiKey;

$crequest = curl_init();


curl_setopt($crequest, CURLOPT_HEADER, 0);
curl_setopt($crequest, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($crequest, CURLOPT_URL, $apiUrl);
curl_setopt($crequest, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($crequest, CURLOPT_VERBOSE, 0);
curl_setopt($crequest, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($crequest);

curl_close($crequest);
$data = json_decode($response);
$currentTime = time();
?>
<div class="weather">
    <h2 class="weather__title">Погода в городе <?php echo $data->name; ?></h2>
    <div class="weather__time">
        <p class="weather__time">Время: <?php echo date("l g:i a", $currentTime); ?></p>
        <p class="weather__date">Дата: <?php echo date("jS F, Y",$currentTime); ?></p>
        <p class="weather__status">Описание погоды: <?php echo ucwords($data->weather[0]->description); ?></p>
    </div>
    <div class="weather__forecast">
        <p class="weather__min">Минимальная температура: <?php echo $data->main->temp_min; ?>°C</p>
        <p class="weather__max">Максимальная температура: <?php echo $data->main->temp_max; ?>°C</p>
    </div>
    <p class="weather__humidity">Влажность: <?php echo $data->main->humidity; ?> %</p>
    <p class="weather__wind">Ветер: <?php echo $data->wind->speed; ?> км/ч</p>
</div>

