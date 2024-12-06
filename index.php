<?php

date_default_timezone_set("UTC");
echo "Nous sommes le " . date('l d F Y') . "<br>";
echo "Le timestamp du début jusqu'a aujourd'hui est de " . time() . "<br>";

$start_date = "16 May 2016";
$end_date = "06 December 2024";
$start_ts = strtotime($start_date);
$end_ts = strtotime($end_date);
$diff = $end_ts - $start_ts;
$jours = cal_days_in_month(CAL_GREGORIAN, 2, 2016);
$twentyDaysLater = date('l d F Y', strtotime('+20 days'));
$daysEarlier = date('l d F Y', strtotime('-22 days'));


echo "Le timestamp du mardi 2 août 2016 à 15h00 jusqu'a aujourd'hui est de " . $diff . "<br>";
echo "En jours cela donne " . ($diff / 86400) . " jours <br>";
echo "Il y avait " . $jours . " jours en Fevrier 2016 <br>";
echo "Dans 20 jours nous seront le " . $twentyDaysLater . "<br>";
echo "Il y a 22 jours nous étions le  " . $daysEarlier . "<br>";

echo '<a href="./calendar.php">Calendrier</a>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>