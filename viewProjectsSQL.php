<?php

//function to get database connection
function getDatabaseConnection() {
    $db = new SQLite3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');
    return $db;
}

function getProjects() {
    $db = getDatabaseConnection();
    $sql = "SELECT * FROM projects"; //SQL query to select data from projects
    $stmt = $db->prepare($sql);

    //check if statment is prepared succesfully
    if ($stmt) {
        $result = $stmt->execute();

        $arrayResult = [];

        while ($row = $result->fetchArray()) {
            $arrayResult[] = $row;
        }

        //return array contaning project data
        return $arrayResult;
    } else {
        die($db->lastErrorMsg());
    }
}


