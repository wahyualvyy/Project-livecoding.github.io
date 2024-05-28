<?php
include("../function/koneksi.php");

$events = array();

$result = mysqli_query($koneksi, "SELECT * FROM tb_kalender");

while ($row = mysqli_fetch_assoc($result)) {
    $event = array(
        'title' => $row['nama'],
        'start' => $row['check_in'],
        'end' => $row['check_out']
    );
    $events[] = $event;
}

echo json_encode($events);
