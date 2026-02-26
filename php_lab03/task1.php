<?php
$shifts = [
    "morningShift" => "8:00-12:00",
    "dayShift" => "12:00-16:00",
    "dayOff" => "Нерабочий день"
];

$shiftsSchedule = [
    [
        "name" => "John Styles",
        "workDays" => ["Monday", "Wednesday", "Friday"],
        "shift" => $shifts["morningShift"]
    ],
    [
        "name" => "Jane Doe",
        "workDays" => ["Tuesday", "Thursday", "Saturday"],
        "shift" => $shifts["dayShift"]
    ],
];

function getCurrentShift($employeeName)
{
    global $shifts;
    global $shiftsSchedule;
    $currentWeekDay = date('l');

    foreach ($shiftsSchedule as $employee) {
        if ($employee["name"] == $employeeName) {
            return in_array($currentWeekDay, $employee["workDays"])
                    ? $employee["shift"]
                    : $shifts["dayOff"];
        }
    }

    return "Name not found";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Lab03</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<table>
    <tr>
        <td>№</td>
        <td><b>Фамилия Имя</b></td>
        <td><b>График работы</b></td>
    </tr>

    <?php
    foreach ($shiftsSchedule as $index => $employee) {
        echo "<tr>
                <td>" . $index+1 . "</td>
                <td>" . $employee["name"] . "</td>
                <td>" . getCurrentShift($employee["name"]) . "</td>
              </tr>";
    }
    ?>
</table>
</body>
</html>