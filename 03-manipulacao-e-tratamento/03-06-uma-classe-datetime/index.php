<?php

setlocale(LC_ALL, "pt-br", "pt_BR.utf-8", "pt-BR", "portuguese");
require __DIR__ . '../../../fullstackphp/fsphp.php';

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);

define('DATE_BR_Y', 'd/m/Y');

define('DATE_BR', 'd/m/Y H:i:s');

$dateNow = new DateTime();
$dateBirthday = new DateTime("1982-06-12");
$dateStatic = DateTime::createFromFormat(DATE_BR, '08/10/2022 19:00:00');

var_dump($dateNow, $dateBirthday, $dateStatic);

var_dump(
    $dateNow->format(DATE_BR),
    $dateNow->format('d')
);

echo "Hoje é dia {$dateNow->format('d')} do {$dateNow->format('F')} de {$dateNow->format('Y')}";

$newDateTimeZone = new DateTimeZone('Pacific/Apia');
$newDateTime = new DateTime("now", $newDateTimeZone);

var_dump([
    'Pacific/Apia' => $newDateTime->format(DATE_BR)
]);

/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

$dateInterval = new DateInterval("P10Y2M1DT12H10M");

var_dump([$dateInterval]);

$dateTime = new DateTime('now');

$dateTime->sub($dateInterval);
$dateTime->add($dateInterval);

var_dump([$dateTime]);


$myBirth = new DateTime(date('2023') . "-09-06");
$myBorn = new DateTime("1997-09-06");
$today = new DateTime('now');
$diff = $today->diff($myBirth);

var_dump($diff, $myBorn, $today->diff($myBorn)->y);

if ($diff->invert) {
    echo "<p> Seu último aniversário foi a {$diff->days} dias.</p>";
} else {
    echo "<p> Faltam {$diff->days} dias para você completar " . (($today->diff($myBorn)->y) + 1) . " anos de idade. </p>";
}

/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);
$month = new DateInterval('P1Y'); // -> períodos de 1 em 1 ano

// recurrences -> envia o numero de datas quando não passar a endDate;
$datePeriod =  new DatePeriod($myBorn, $month, 5, DatePeriod::EXCLUDE_START_DATE);
$datePeriodY =  new DatePeriod($myBorn, $month, $today);

foreach ($datePeriod as $date) {
    echo "<p class='text_red'> {$date->format(DATE_BR_Y)} </p>";
}

echo "<br> <hr> <br>";

// períodos entre a data inicial e a final, definidos pelo dateInterval
foreach ($datePeriodY as $date) {
    echo "<p> {$date->format(DATE_BR_Y)} </p>";
}

var_dump($datePeriodY);

// formato iso -> recorrencia 4 / data de inicio / periodo
$iso = 'R4/2012-07-01T00:00:00:00Z/P7D';
