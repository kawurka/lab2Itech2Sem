<!DOCTYPE HTML>
<html>

<head>
    <title>Лабораторна работа 2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="localStorage.js">
    </script>
</head>

<body>

<form method="get" action="forms.php">
    <p>Вывести расписание лабораторных работ группы <select name="group" id="group" onchange="getLS1()">
        <?php
            include 'connection.php';
            $group = $collection->distinct("group");
            foreach ($group as $document) {
                echo "<option>";
                print($document);
                echo "</option>";
            }
            echo '</select>';
        ?>
    <input type="submit" name="SubmButtonGroup" value="Ок"></p>
</form>

<form method="get" action="forms.php">
    <p>Вывести расписание занятий преподавателя по дисциплине <select name="teacher" id=teacher onchange="getLS2()">
        <?php
            include 'connection.php';
            $group = $collection->distinct("teacher");
            foreach ($group as $document) {
                echo "<option>";
                print($document);
                echo "</option>";
            }
            echo '</select>';
        ?>
    дисциплина
    <select name="disciple" id="disciple" onchange = "getLS2()">
            <?php
            include 'connection.php';
            $group = $collection->distinct("disciple");
            foreach ($group as $document) {
                echo "<option>";
                print($document);
                echo "</option>";
                }
                echo '</select>';
            ?>

            <input type="submit"  value="Ок"></p>
</form>

<form method="get" action="forms.php">
    <p>Вывести расписание аудитории <select name="auditorium" id="auditorium" onchange="getLS3()">
        <?php
            include 'connection.php';
            $auditorium = $collection->distinct("auditorium");
            foreach ($auditorium as $document) {
                echo "<option>";
                print($document);
                echo "</option>";
            }
            echo '</select>';
            ?>
    <input type="submit" value="Ок"></p>

<p id = "res"></p>
</form>
</body>
</html>