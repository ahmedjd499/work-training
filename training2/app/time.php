<?php
function calculateHoursDifference($startDateTime, $endDateTime) {
    // Create DateTime objects from the provided strings or timestamps
    $start = new DateTime($startDateTime);
    $end = new DateTime($endDateTime);

    // Calculate the interval between the two DateTime objects
    $interval = $start->diff($end);

    // Calculate the total hours difference as a float
    $hoursDifference = $interval->h + ($interval->i / 60) + ($interval->s / 3600) + ($interval->days * 24);

    return $hoursDifference;
}

// Example usage:
$startDateTime = "2023-10-18 09:00:00";
$endDateTime = "2023-10-18 10:00:00";
$hourlyPrice = 10; // Replace with the actual hourly price

$hoursDifference = calculateHoursDifference($startDateTime, $endDateTime);
$totalPrice = $hoursDifference * $hourlyPrice;
echo "Hours Difference (Float): " . $hoursDifference . PHP_EOL;
echo "Total Price: $" . number_format($totalPrice, 2);


?>