<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    if (isset($_GET['group'])) {
        include 'connection.php';
        $group = $_GET['group'];
        $key = $group;
        $type = 'Laboratory';

        $cursor = $collection->find(
            [
                'group' => $group,
                'type' => $type
            ]
        );
        $result = "<table border=1 id=table><tr><th>Group</th><th>Day</th><th>Number</th><th>Auditorium</th><th>Disciple</th><th>Type</th><th>Teacher</th></tr>";;
        foreach ($cursor as $document) {

            $day = $document['day'];
            $number = $document['number'];
            $auditorium = $document['auditorium'];
            $disciple =  $document['disciple'];
            $teacher = $document['teacher'];

            if (is_object($teacher)) {
                $teacher = (array)$teacher;
                $teacher = (implode(' ', $teacher));
            }
            $result = $result . "<tr><td>$group</td><td>$day</td><td>$number</td><td>$auditorium</td><td>$disciple</td><td>$type</td><td>$teacher</td></tr>";  
        }
        echo $result;
        echo "<script> localStorage.setItem('$key', '$result'); </script>";
    }
?>
<?php
    if (isset($_GET['teacher']) && isset($_GET['disciple'])) {
        include 'connection.php';
        $teacher = $_GET['teacher'];
        $disciple = $_GET['disciple'];
        $cursor = $collection->find(
            [
                'teacher' => $teacher,
                'disciple' => $disciple
            ]
        );
        $key = $teacher." ".$disciple;
        $result = "<table border=1 id=table><tr><th>Group</th><th>Day</th><th>Number</th><th>Auditorium</th><th>Disciple</th><th>Type</th><th>Teacher</th></tr>";;
        foreach ($cursor as $document) {
            $group = $document['group'];
            $day = $document['day'];
            $number = $document['number'];
            $auditorium = $document['auditorium'];
            $type = $document['type'];
        
        if (is_object($group)) {
            $group = (array)$group;
            $group = (implode(' ', $group));
        }
        $result = $result . "<tr><td>$group</td><td>$day</td><td>$number</td><td>$auditorium</td><td>$disciple</td><td>$type</td><td>$teacher</td></tr>"; 
    }
    echo $result;
    echo "<script> localStorage.setItem('$key', '$result');</script>";
}
?>
<?php
    if (isset($_GET['auditorium'])) {
        include 'connection.php';
        $auditorium = $_GET['auditorium'];
        $key = $auditorium;
        $cursor = $collection->find(
            [
                'auditorium' => $auditorium,
            ]
        );
        $result = "<table border=1 id=table><tr><th>Group</th><th>Day</th><th>Number</th><th>Auditorium</th><th>Disciple</th><th>Type</th><th>Teacher</th></tr>";
        foreach ($cursor as $document) {
        
        $group = $document['group'];
        $day = $document['day'];
        $number = $document['number'];
        $teacher = $document['teacher'];
        $disciple = $document['disciple'];
        $type = $document['type'];
        if (is_object($group)) {
            $group = (array)$group;
            $group = (implode(' ', $group));
        }

        if (is_object($teacher)) {
            $teacher = (array)$teacher;
            $teacher = (implode(' ', $teacher));
        }
        $result = $result . "<tr><td>$group</td><td>$day</td><td>$number</td><td>$auditorium</td><td>$disciple</td><td>$type</td><td>$teacher</td></tr>";  
    }
    echo $result; 
    echo "<script> localStorage.setItem('$key', '$result');</script>";  
}     
?>
