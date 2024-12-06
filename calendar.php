<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 10px;
        }
        th {
            background-color: #f4f4f4;
        }
        form {
            text-align: center;
            margin: 20px;
        }
        select, button {
            padding: 10px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Calendrier</h1>
    <form method="GET">
        <label for="month">Mois :</label>
        <select id="month" name="month">
            <?php
            for ($m = 1; $m <= 12; $m++) {
                $selected = (isset($_GET['month']) && $_GET['month'] == $m) ? 'selected' : '';
                echo "<option value=\"$m\" $selected>" . date('F', mktime(0, 0, 0, $m, 1)) . "</option>";
            }
            ?>
        </select>

        <label for="year">Année :</label>
        <select id="year" name="year">
            <?php
            $currentYear = date('Y');
            for ($y = $currentYear - 10; $y <= $currentYear + 10; $y++) {
                $selected = (isset($_GET['year']) && $_GET['year'] == $y) ? 'selected' : '';
                echo "<option value=\"$y\" $selected>$y</option>";
            }
            ?>
        </select>

        <button type="submit">Afficher</button>
    </form>

    <?php
    if (isset($_GET['month']) && isset($_GET['year'])) {
        $month = (int)$_GET['month']; 
        $year = (int)$_GET['year'];

        // Calcul du premier jour et du nombre de jours dans le mois
        $firstDayOfMonth = date('w', strtotime("$year-$month-01"));
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        // Affichage du calendrier
        echo "<table>";
        echo "<tr>
                <th>Dim</th>
                <th>Lun</th>
                <th>Mar</th>
                <th>Mer</th>
                <th>Jeu</th>
                <th>Ven</th>
                <th>Sam</th>
              </tr>";
        
        // Remplissage des jours
        $currentDay = 1;
        echo "<tr>";

        // Espaces pour les jours avant le début du mois
        for ($i = 0; $i < $firstDayOfMonth; $i++) {
            echo "<td></td>";
        }

        // Affichage des jours du mois
        for ($day = $firstDayOfMonth; $day < 7; $day++) {
            echo "<td>$currentDay</td>";
            $currentDay++;
        }
        echo "</tr>";

        // Les semaines suivantes
        while ($currentDay <= $daysInMonth) {
            echo "<tr>";
            for ($i = 0; $i < 7; $i++) {
                if ($currentDay <= $daysInMonth) {
                    echo "<td>$currentDay</td>";
                    $currentDay++;
                } else {
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }

        echo "</table>";
    }
    ?>
</body>
</html>
