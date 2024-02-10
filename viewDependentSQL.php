<?php

include_once 'viewDependents.php';

function getDependents() {
    $db = getDatabaseConnection();

    //SQL query to get dependent data from db with joins
    $sql = "
        SELECT
            EMPLOYEES.EMP_NUM,
            EMPLOYEES.EMP_FNAME || ' ' || EMPLOYEES.EMP_LNAME AS EMP_NAME,
            DEPENDENTS.dependent_id,
            DEPENDENTS.RELATIONSHIP,
            DEPENDENTS.R_FNAME || ' ' || DEPENDENTS.R_LNAME  AS D_NAME,
            DEPENDENTS.R_EMAIL,
            DEPENDENTS.R_PHONENUM
        FROM
            DEPENDENTS
        JOIN
            EMPLOYEES ON EMPLOYEES.EMP_NUM = DEPENDENTS.EMP_NUM
    ";

    $stmt = $db->prepare($sql);

    //check if statment is prepared succesfully
    if ($stmt) {
        $result = $stmt->execute();

        $arrayResult = [];

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $arrayResult[] = $row;
        }

        //return array contaning dependent data
        return $arrayResult;
    } else {
        die($db->lastErrorMsg());
    }
}

//call function and store result in dependentsData
$dependentsData = getDependents();


foreach ($dependentsData as $dependents) {
}