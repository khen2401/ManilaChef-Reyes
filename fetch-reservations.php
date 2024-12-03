<?php
session_start();
header('Content-Type: application/json');
include('config/dbcon.php');

// SQL query
$sql = "SELECT reservation.name, reservation.reservation_no, venue.name AS venue_name, event.name AS event_type, reservation.date, reservation.time
        FROM reservation
        JOIN venue ON reservation.venue_id = venue.id
        JOIN event ON reservation.event_id = event.id";

$result = mysqli_query($con, $sql);

if (!$result) {
    die("Query failed: " . $con->error);
}

$events = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = array(
            'title' =>  $row['event_type'] .' Event ' . ' @ ' . $row['venue_name'],
            'start' => $row['date'] . 'T' . $row['time'],
            'data' => $row
        );
    }
}
$con->close();

echo json_encode($events);
?>