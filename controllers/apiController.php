<?php
    $dataTimetable = file_get_contents("https://api.projekts.area.lv/api/timetable");
    $timetable =  json_decode($dataTimetable, true);

    $dataGroups = file_get_contents("https://api.projekts.area.lv/api/groups");
    $groups =  json_decode($dataGroups, true);

    if (isset($_POST['group'])){
        $groupId = $_POST['group'];
        $groupName =  $groups['data'][$groupId-1]['name'];
        require "../views/timetable.view.php";

    }
    else {
        $groupId = 0;
        require "../views/timetable.view.php";
        
    }



?>