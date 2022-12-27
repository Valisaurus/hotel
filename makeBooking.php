<?php

require "backend.php";
//sql statement to check database for availability, if dates availible, put booking in the calendar.

$startdate = trim($_POST['startdate']);
$enddate = trim($_POST['enddate']);

//part below alrdy done in backend.php
$statement = $dbh->query('SELECT * FROM bookings');

$bookings = $statement->fetchAll(PDO::FETCH_ASSOC);

//putting the booking to the database

// $title = trim($_POST['title']);
// $tmdbUrl = trim($_POST['tmdb_url']);

$statement = $dbh->prepare("INSERT INTO bookings('start_date', 'end_date', 'room') VALUES (:start_date, :end_date 
,:room)");

$statement->bindParam(':start_date', $startdate, PDO::PARAM_INT);
$statement->bindParam(':end_date', $enddate, PDO::PARAM_INT);
// $statement->bindParam(':room', 'regular', PDO::PARAM_STR);

$statement->execute();


// header("location: index.php");