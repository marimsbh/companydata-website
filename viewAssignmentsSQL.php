<?php

// function to get assignment data from database
function getAssignments() {
    // Use the existing getDatabaseConnection function
    $db = getDatabaseConnection();

    //SQL query to select assignment data from db
    $sql = "
        SELECT
            ASSIGNMENTS.PROJ_NO,
            PROJECTS.PROJ_NAME,
            ASSIGNMENTS.EMP_NUM,
            EMPLOYEES.EMP_FNAME || ' ' || EMPLOYEES.EMP_MNAME || ' ' || EMPLOYEES.EMP_LNAME AS EMP_NAME,
            EMPLOYEES.ROLES,
            ASSIGNMENTS.HOURS
        FROM
            ASSIGNMENTS
        JOIN
            EMPLOYEES ON ASSIGNMENTS.EMP_NUM = EMPLOYEES.EMP_NUM
        JOIN
            PROJECTS ON ASSIGNMENTS.PROJ_NO = PROJECTS.PROJ_NO
    ";

    $stmt = $db->prepare($sql);

    //check if statment is prepared succesfully
    if ($stmt) {
        $result = $stmt->execute();

        $arrayResult = [];

        // Fetch associative array (column names as keys)
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $arrayResult[] = $row;
        }

        //return array containing assignment data
        return $arrayResult;
    } else {
        //handle error if statement not succesful
        die($db->lastErrorMsg());
    }
}

//call assignment function and store the result in assignmentData
$assignmentData = getAssignments();


foreach ($assignmentData as $assignment) {

}


