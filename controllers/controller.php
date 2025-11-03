<?php
    if (isset($_POST['group'])){
        $groupId = $_POST['group'];
        require "../views/timetable.view.php";

    }
    else {
        require "../views/timetable.view.php";
    }
?>